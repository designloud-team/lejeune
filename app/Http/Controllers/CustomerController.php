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

        return view('customers.show', compact('customer'));

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

        return view('customers.show', compact('customer'));

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
