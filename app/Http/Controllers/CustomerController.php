<?php

namespace App\Http\Controllers;

use App\CSVtoSQL;
use App\Customer;
use App\Repositories\CustomerRepository;
use Auth;
use Excel;
use Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function __construct(CustomerRepository $customer)
    {
        $this->middleware('auth');
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getDashboard()
    {

        return view('customers.dashboard', [
            'page_title' => 'Customers Administration',
            'page_description' => 'All Customers'
        ]);

    }


    public function index()
    {

        if (request()->wantsJson()) {

            \GuzzleHttp\json_encode($this->getCustomerDatatablesData());
        }
        return view('customers.index', [
            'page_title' => 'Customers',
            'page_description' => 'All Customers',
            'customers' => Customer::all()
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
        return view('customers.create' , [
            'page_title' => 'Customers',
            'page_description' => 'New Customers',
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
        $data = $request->all();

//        dd($data);
        $customer = Customer::create($data);

        $jobs = $customer->jobs;
        $invoices = $customer->invoices;

        return view('customers.show', compact('customer', 'invoices', 'jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::find($id);
        $jobs = $customer->jobs;
        $invoices = $customer->invoices;
        return view('customers.show', compact('customer', 'invoices', 'jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer = Customer::find($id);
        $data = $request->all();

        $customer->update($data);

        $jobs = $customer->jobs;
        $invoices = $customer->invoices;

        return view('customers.show', compact('customer', 'invoices', 'jobs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);

        $status = $customer->delete();
        if(request()->ajax())
        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);

        Session::flash('flash_message', 'Customer Successfully Deleted');

        return redirect()->to('customers') ;


    }
    public function destroyAll(Request $request)
    {
        $this->validate($request, ["customers" => "required|array"]);

        $ids = $request->get("customers");
        $status = Customer::destroy($ids);

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);


    }

    public function getDatatablesData($type, Request $request)
    {
        switch ($type) {
            case 'index':
                return $this->getCustomerDTData();
                break;
            case 'delete':
//                return $this->deleteCustomerDTData();
                break;
        }
    }
    protected function getCustomerDTData()
    {

        $query = Customer::all();

        return DataTables::of($query)
            ->addColumn('hash_id', function ($result) {
                return $result->hash_id;
            })
            ->editColumn('name', function ($customer) {
                return $customer->use_display_name == 1 ? $customer->display_name : $customer->name;
            })
            ->addColumn('actions', function ($customer) {
                return (string) view('customers.partials.actions', compact('customer'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function getCustomerJsonData($id, $type, Request $request)
    {
        $customer = Customer::find($id);
        switch ($type) {
            case 'jobs':
                return $this->getCustomerJobDTData($customer);
                break;
            case 'reports':
                return $this->getCustomerReportDTData($customer);
                break;
            case 'invoices':
                return $this->getCustomerInvoiceDTData($customer);
                break;
        }
    }


    protected function getCustomerJobDTData($customer)
    {

        $query = $customer->jobs;


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
    protected function getCustomerInvoiceDTData($customer)
    {

        $query = $customer->invoices;


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

            ->addColumn('actions', function ($invoice) {
                return (string) view(' invoices.partials.actions', compact('invoice'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    protected function getCustomerReportDTData($customer)
    {

        $query = $customer->reports;


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
            ->editColumn('is_completed', function ($report) {
                return $report->is_completed ? 'yes' : 'no';

            })
            ->editColumn('completion_date', function ($report) {
                return !is_null($report->completion_date)? convert_to_date($report->completion_date): 'Not Started';

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
        $data = Customer::select(
            'company',
            'name',
            'phone_number',
            'mobile',
            'email',
            'display_name',
            'website',
            'billing_address',
            'shipping_address')
            ->get()
            ->toArray();

//        unset($data[0]['id']);
//        unset($data[0]['company_id']);

        return Excel::create('customers_export', function ($excel) use ($data) {
            $excel->sheet('customers', function ($sheet) use ($data) {
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
            $columns = $csv->getTableColumns('customers');

            $array = [];

            foreach ($columns as $value) {

                array_push($array, $value->Field);

            }
            $array = array_where($array, function ($value, $key) {

                $cols = ['id', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'use_display_name'];

                return !in_array($value, $cols);
            });


            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {

                        foreach ($data->toArray() as $key => $value) {

                            if(!empty($value)){
                                //foreach ($value as $k => $v) {
                                $insert[] = [
                                    'company' => $value['company'],
                                    'name' => $value['name'],
                                    'phone_number' => $value['phone_number'],
                                    'mobile' => $value['mobile'],
                                    'email' => $value['email'],
                                    'display_name' => $value['display_name'],
                                    'website' => $value['website'],
                                    'billing_address' => $value['billing_address'],
                                    'shipping_address' => $value['shipping_address'],
                                    'user_id' => Auth::user()->id,
                                ];
                                //}
                            }
                        }
                        if(!empty($insert)){
                            foreach($insert as $customer){
                                Customer::create($customer);
                            }
                            Session::flash('flash_message', 'Import Successful!');
                            return back();
                        }
                    }
                }
                return back()->with('error','Please Check your file, Something is wrong there.');

            }

}
