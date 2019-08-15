<?php

namespace App\Http\Controllers;

use App\CSVtoSQL;
use App\Customer;
use App\Job;
use Excel;
use Auth;
use DB;
use Session;
use App\Notary;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDashboard()
    {

        return view('jobs.dashboard', [
            'page_title' => 'Jobs Administration',
            'page_description' => 'All Jobs'
        ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->wantsJson()) {

            \GuzzleHttp\json_encode($this->getJobDTData());
        }
        return view('jobs.index', [
            'page_title' => 'Jobs',
            'page_description' => 'All Jobs',
            'jobs' => Job::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all()->pluck('name', 'id');


        $notaries = Notary::all()->pluck('full_name', 'id');

        return view('jobs.create' , [
            'page_title' => 'Jobs',
            'page_description' => 'New Job',
            'customers' => $customers,
            'notaries' => $notaries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => ['unique:jobs'],
        ]);

        $data = $request->all();


        $job = Job::create($data);

//        $job = Job::create([
//            'borrower' => $data['borrower'],
//            'coborrower' => $data['coborrower'],
//            'daytime_phone' => $data['daytime_phone'],
//            'evening_phone' => $data['evening_phone'],
//            'signing_address' => $data['signing_address'],
//            'property_address' => $data['property_address'],
//            'date' => $data['date'],
//            'time' => $data['time'],
//            'packages' => $data['packages'],
//            'local' => $data['local'],
//            'notary_fee' => $data['notary_fee'],
////            'status' => 'new',
//            'notary_id' => $data['notary_id'],
//            'customer_id' => $data['customer_id'],
//            'user_id' => Auth::user()->id,
//
//        ]);

        $notaries = $job->notaries;
        $invoices = $job->invoices;
        $reports = $job->reports;

        return view('jobs.show', compact('job','notaries', 'invoices', 'reports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job = Job::find($id);

        $notaries = $job->notaries;
        $invoices = $job->invoices;
        $reports = $job->reports;

        return view('jobs.show', compact('job','notaries', 'invoices', 'reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $job = Job::find($id);
        $notaries = $job->notaries;
        $invoices = $job->invoices;
        $reports = $job->reports;
        $customers = Customer::all()->pluck('name', 'id');
        $notaries = Notary::all()->pluck('full_name', 'id');

        return view('jobs.edit', compact('job','notaries', 'invoices', 'reports'), [
            'page_title' => 'Jobs',
            'page_description' => 'Edit Job',
            'customers' => $customers,
            'notaries' => $notaries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $job = Job::find($id);

        $job->update($data);

        $notaries = $job->notaries;
        $invoices = $job->invoices;
        $reports = $job->reports;

        return view('jobs.show', compact('job','notaries', 'invoices', 'reports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $job = Job::find($id);

        $status = $job->delete();

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);
    }
    public function destroyAll(Request $request)
    {
        $this->validate($request, ["jobs" => "required|array"]);

        $ids = $request->get("jobs");
        $status = Job::destroy($ids);

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);


    }
    public function getDatatablesData($type, Request $request)
    {
        switch ($type) {
            case 'index':
                return $this->getJobDTData();
                break;
            case 'delete':
//                return $this->deleteJobDTData();
                break;
        }
    }
    protected function getJobDTData()
    {

        $query = Job::whereNotIn('status', ['completed', 'completed_w_issues'])->get();
//        $query = Job::all();
        return DataTables::of($query)

            ->addColumn('hash_id', function ($result) {
                return $result->hash_id;
            })
            ->editColumn('date', function ($job) {
                return date('l F jS, Y g:i A',strtotime($job->date . $job->time));
            })
            ->editColumn('status', function ($job) {
                if($job->status == 'new') {return 'New';}
                if($job->status == 'completed_w_issues') {return 'Completed With Issues';}
                if($job->status == 'completed') {return 'Completed';}
                if($job->status == 'not_completed') {return 'Not Completed';}
                return $job->status;
            })
            ->addColumn('actions', function ($job) {
                return (string) view(' jobs.partials.actions', compact('job'));
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
        $data = Job::select(
            'registered_id',
            'borrower',
            'coborrower',
            'daytime_phone',
            'evening_phone',
            'signing_address',
            'property_address',
            'date',
            'time',
            'packages',
            'local',
            'notary_fee',
            'status')
            ->get()
            ->toArray();

//        unset($data[0]['id']);
//        unset($data[0]['company_id']);

        return Excel::create('jobs_export', function ($excel) use ($data) {
            $excel->sheet('jobs', function ($sheet) use ($data) {
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
            $columns = $csv->getTableColumns('jobs');

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
                            'registered_id' => $value['registered_id'] ? $value['registered_id'] : 0,
                            'borrower' => $value['borrower'],
                            'coborrower' => $value['coborrower'],
                            'daytime_phone' => $value['daytime_phone'],
                            'evening_phone' => $value['evening_phone'],
                            'signing_address' => $value['signing_address'],
                            'property_address' => $value['property_address'],
                            'date' => $value['date'],
                            'time' => $value['time'],
                            'packages' => $value['packages'],
                            'local' => $value['local']?$value['local']:0,
                            'notary_fee' => $value['notary_fee'],
                            'status' => $value['status'],
                            'user_id' => Auth::user()->id,
                        ];
                        //}

                    }

                    if (!empty($insert)) {
                        foreach ($insert as $job) {
                            Job::create($job);
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
        return view('jobs.search');
    }
    public function findJobById(Request $request)
    {
        return Job::where('registered_id', $request->id)->get();
    }
}
