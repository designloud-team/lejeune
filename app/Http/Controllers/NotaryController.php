<?php

namespace App\Http\Controllers;

use App\CSVtoSQL;
use App\Customer;
use Excel;
use Session;
use Auth;
use App\Notary;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDashboard()
    {

        return view('notaries.dashboard', [
            'page_title' => 'Notaries Administration',
            'page_description' => 'All Notaries'
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

            \GuzzleHttp\json_encode($this->getNotaryDTData());
        }
        return view('notaries.index', [
            'page_title' => 'Notaries',
            'page_description' => 'All Notaries',
            'notaries' => Notary::all()
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
        return view('notaries.create' , [
            'page_title' => 'Notaries',
            'page_description' => 'New Notary',
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
            'email' => ['unique:notaries'],
        ]);

        $data = $request->all();
        $notary = Notary::create($data);

        $jobs = $notary->jobs;
        $invoices = $notary->invoices;
        $reports = $notary->reports;
        return view('notaries.show', compact('notary','jobs', 'invoices', 'reports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $notary = Notary::find($id);

        $jobs = $notary->jobs;
        $invoices = $notary->invoices;
        $reports = $notary->reports;

        return view('notaries.show', compact('notary','jobs', 'invoices', 'reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $notary = Notary::find($id);
        $jobs = $notary->jobs;
        $invoices = $notary->invoices;
        $reports = $notary->reports;
        return view('notaries.edit', compact('notary','jobs', 'invoices', 'reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $notary = Notary::find($id);

        $notary->update($data);
        $jobs = $notary->jobs;
        $invoices = $notary->invoices;
        $reports = $notary->reports;

        return view('notaries.show', compact('notary','jobs', 'invoices', 'reports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notary = Notary::find($id);

        $status = $notary->delete();

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);
    }
    public function destroyAll(Request $request)
    {
        $this->validate($request, ["notaries" => "required|array"]);

        $ids = $request->get("notaries");
        $status = Notary::destroy($ids);

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);


    }
    public function getDatatablesData($type, Request $request)
    {
        switch ($type) {
            case 'index':
                return $this->getNotaryDTData();
                break;
            case 'delete':
//                return $this->deleteNotaryDTData();
                break;
        }
    }
    protected function getNotaryDTData()
    {

        $query = Notary::all();


        return DataTables::of($query)
//            ->filterColumn(function ($query, $keyword){
//                return $query->where('state', 'like', '%'.$keyword.'%')
//                     ->orWhere('business_name', 'like', '%'.$keyword.'%')
//                    ->orWhere('first_name', 'like', '%'.$keyword.'%')
//                    ->orWhere('last_name', 'like', '%'.$keyword.'%');
//            })
            ->addColumn('hash_id', function ($result) {
                return $result->hash_id;
            })
            ->editColumn('name', function ($notary) {
                return ($notary->business_name ? $notary->business_name .', ': '') . $notary->first_name." ".$notary->last_name;

            })
            ->addColumn('actions', function ($notary) {
                return (string) view(' notaries.partials.actions', compact('notary'));
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
        $data = Notary::select(
            'local',
            'state',
            'first_name',
            'last_name',
            'business_name',
            'mailing_address',
            'delivery_address',
            'email',
            'phone',
            'alternate_phone',
            'fax',
            'website',
            'e_docs',
            'insurance',
            'insurance_amount',
            'ssn_or_ein',
            'notes')
            ->get()
            ->toArray();

//        unset($data[0]['id']);
//        unset($data[0]['company_id']);

        return Excel::create('notaries_export', function ($excel) use ($data) {
            $excel->sheet('notaries', function ($sheet) use ($data) {
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
            $columns = $csv->getTableColumns('notaries');

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
                $duplicates = [];
                $empty = [];

                foreach ($data->toArray() as $key => $value) {

                    $duplicate = Notary::where('email', $value['email'])->first();

                    if (!empty($value) && !$duplicate && isset($value['email'])) {
                        //foreach ($value as $k => $v) {
                        $insert[] = [
                            'local' => $value['local'] ? $value['local'] : 0,
                            'state' => $value['state'],
                            'first_name' => $value['first_name'],
                            'last_name' => $value['last_name'],
                            'business_name' => $value['business_name'],
                            'mailing_address' => $value['mailing_address'],
                            'delivery_address' => $value['delivery_address'],
                            'email' => $value['email'],
                            'phone' => $value['phone'],
                            'alternate_phone' => $value['alternate_phone'],
                            'fax' => $value['fax'],
                            'website' => $value['website'],
                            'e_docs' => $value['e_docs'] ? $value['e_docs'] : 0,
                            'insurance' => $value['insurance'] ? $value['insurance'] : 0,
                            'insurance_amount' => $value['insurance_amount'],
                            'ssn_or_ein' => $value['ssn_or_ein'],
                            'notes' => $value['notes'],
                            'user_id' => Auth::user()->id,
                        ];
                        //}
                    } else {
                        if ($duplicate) {
                            array_push($duplicates, $value['email']);
                        }
                        if (!isset($value['email'])) {
                            if (isset($value['business_name'])) {
                                array_push($empty, $value['business_name']);
                            }
                        }
                    }

                    if (!empty($insert)) {
                        foreach ($insert as $notary) {
                            Notary::create($notary);
                        }

                        Session::flash('flash_message', 'Import Successful!');
                        return back();
                    }
                }
            }
        }
        if(count($duplicates) || count($empty)) {
            Session::flash('errors', implode(', ', $duplicates) . ' were duplicates.<br>'. implode(', ', $empty) .' had no email address.');
        }

        return back()->with('error','Please Check your file, Something is wrong there.');

    }

    public function searchByState()
    {
        return view('notaries.search');
    }
    public function findNotaryByState(Request $request)
    {
        return Notary::where('state', $request->state)->get();
    }

}
