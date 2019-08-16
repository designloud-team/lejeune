<?php

namespace App\Http\Controllers;

use App\Job;
use App\Notifications\NewCompletedReport;
use App\Report;
use Illuminate\Http\Request;
use App\CSVtoSQL;
use App\Customer;
use Excel;
use Auth;
use DB;
use Session;
use App\Notary;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->wantsJson()) {

            \GuzzleHttp\json_encode($this->getReportDTData());
        }
        return view('reports.index', [
            'page_title' => 'Reports',
            'page_description' => 'All Reports',
            'reports' => Report::all()
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $report = Report::find($id);

        $notary = Notary::find($report->notary_id);
        $invoices = $report->invoices;
        $customer = Customer::find($report->customer_id);
        $job = Job::find($report->job_id);

        return view('reports.show', compact('report','notary', 'invoices', 'job', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = Report::find($id);
        $invoices = $report->invoices;
        $reports = $report->reports;
        $customers = Customer::all()->pluck('name', 'id');
        $notaries = Notary::all()->pluck('full_name', 'id');

        return view('reports.edit', compact('report','notaries', 'invoices', 'reports'), [
            'page_title' => 'Reports',
            'page_description' => 'Edit Report',
            'customers' => $customers,
            'notaries' => $notaries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $report = Report::find($id);

        $report->update($data);

        $notaries = $report->notaries;
        $invoices = $report->invoices;
        $reports = $report->reports;

        return view('reports.show', compact('report','notaries', 'invoices', 'reports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $report = Report::find($id);

        $status = $report->delete();

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);
    }
    public function destroyAll(Request $request)
    {
        $this->validate($request, ["reports" => "required|array"]);

        $ids = $request->get("reports");
        $status = Report::destroy($ids);

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);


    }
    public function getDatatablesData($type, Request $request)
    {
        switch ($type) {
            case 'index':
                return $this->getReportDTData();
                break;
            case 'all-reports':
                return $this->getAllReportDTData();
                break;
            case 'delete':
//                return $this->deleteReportDTData();
                break;
        }
    }
    protected function getReportDTData()
    {

        $query = Report::all();
        return DataTables::of($query)

            ->addColumn('hash_id', function ($result) {
                return $result->hash_id;
            })

            ->addColumn('actions', function ($report) {
                return (string) view(' reports.partials.actions', compact('report'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    protected function getAllReportDTData()
    {

        $query = Report::all();

        return DataTables::of($query)

            ->addColumn('hash_id', function ($result) {
                return $result->hash_id;
            })

            ->addColumn('actions', function ($report) {
                return (string) view(' reports.partials.actions', compact('report'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * File Export Code
     *
     * @var array
     */
    public function downloadExcel(Request $request, $type)
    {
        $data = Report::select(
            'is_completed',
            'tracking',
            'courier',
            'completion_date',
            'shipping_date',
            'explanation',
            'customer_id',
            'notary_id',
            'job_id'
            )
            ->get()
            ->toArray();

//        unset($data[0]['id']);
//        unset($data[0]['company_id']);

        return Excel::create('reports_export', function ($excel) use ($data) {
            $excel->sheet('reports', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel(Request $request)
    {

        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $csv = new CSVtoSQL($path);
            $csv->readDataIn();
            $columns = $csv->getTableColumns('reports');

            $array = [];

            foreach ($columns as $value) {

                array_push($array, $value->Field);

            }
            $array = array_where($array, function ($value, $key) {

                $cols = ['id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];

                return !in_array($value, $cols);
            });


            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {

                foreach ($data->toArray() as $key => $value) {

                    if (!empty($value)) {
                        //foreach ($value as $k => $v) {
                        $insert[] = [
                            'is_completed' => $value['is_completed'] ? $value['is_completed'] : 'new',
                            'tracking' => $value['tracking'],
                            'completion_date' => $value['completion_date'],
                            'shipping_date' => $value['shipping_date'],
                            'courier' => $value['courier'],
                            'job_id'=> $value['job_id'],
                            'user_id' => Auth::user()->id,
                        ];
                        //}

                    }

                    if (!empty($insert)) {
                        foreach ($insert as $report) {
                            Report::create($report);
                        }

                        Session::flash('flash_message', 'Import Successful!');

                        return back();
                    }
                }
            }
        }

        return back()->with('error','Please Check your file, Something is wrong there.');

    }

    public function searchById()
    {
        return view('reports.search');
    }
    public function findReportById(Request $request)
    {
        return Report::where('registered_id', $request->id)->get();
    }
}
