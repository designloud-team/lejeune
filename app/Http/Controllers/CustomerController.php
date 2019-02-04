<?php

namespace App\Http\Controllers;

use App\Customer;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
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

        if (request()->wantsJson()) {

            return \GuzzleHttp\json_encode($this->forUserDatatables()->getData());
        }
        return view('customers.index', [
            'page_title' => 'Customers',
            'page_description' => 'All Customers',
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
    protected function forUserDatatables()
    {

//        $query = Customer::where('user_id', '=', Auth::user()->id);
        $query = Customer::all();

//        if (request()->has('name')) {
//            $query->where('first_name', 'like', request('name'))->orWhere('organization', 'like', request('name'))->orWhere('last_name', 'like', request('name'));
//        }

        return Datatables::of($query)
            ->addColumn('name', function ($customer) {
                return $customer->company ? $customer->company: $customer->name ;

            })
            ->addColumn('display_name', function ($customer) {
                return $customer->display_name ? $customer->display_name: ' ' ;

            })
            ->addColumn('actions', function ($customer) {
                return (string) view('customers.partials.actions', compact('customer'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function getCustomerJsonData()
    {
        
    }
}
