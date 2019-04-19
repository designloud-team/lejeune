<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomerRepository;
use Auth;
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

        dd($data);
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

        return view('customers.show', compact('customer'));
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
        return $status == 1? 'true' : 'false';

        Session::flash('flash_message', 'Customer Successfully Deleted');

        return redirect()->to('customers') ;


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
            ->addColumn('actions', function ($customer) {
                return (string) view('customers.partials.actions', compact('customer'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
