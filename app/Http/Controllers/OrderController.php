<?php

namespace App\Http\Controllers;

use App\Notifications\NewOnlineOrder;
use App\Notifications\NewOrder;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
use Excel;
use Auth;
use App\CSVtoSQL;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->wantsJson()) {

            \GuzzleHttp\json_encode($this->getOrderDTData());
        }
        return view('orders.index', [
            'page_title' => 'Orders',
            'page_description' => 'All Orders',
            'orders' => Order::all()
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

        $customer = Customer::find($id);
        $data = $request->all();

        $customer->update($data);

        return view('customers.show', compact('customer'));
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
        $order = Order::create([
              "type" => $request->type,
              "is_business" => $request->is_business,
              "name" => $request->name,
              "company" => $request->company,
              "phone" => $request->phone,
              "service_address" => $request->service_address,
              "service_date" => $request->service_date,
              "service_time" => $request->service_time,
              "people" =>$request->people,
              "packages" => $request->packages,
              "service" => $request->service,
              "comment" => $request->comment,
              "is_new" => 1,
        ]);
//        $user = User::where('email','=','rraynor@lejeunenotaries.com')->firstOrFail();
        $user = User::where('email','=','nmorgan@designloud.com')->firstOrFail();
        $user->notify(new NewOrder($order));

        Session::flash('flash_message', 'Order Received');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::find($id);

//        $jobs = $notary->jobs;
//        $invoices = $notary->invoices;
        $order->update(['is_new' => 0 ]);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);;

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $order = Order::find($id);;

        return view('orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $order = Order::find($id);

        $status = $order->delete();

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);
    }
    public function destroyAll(Request $request)
    {
        $this->validate($request, ["orders" => "required|array"]);

        $ids = $request->get("orders");
        $status = Order::destroy($ids);

        return response()->json([
            'success' => $status >= 1 ? 'true' : 'false',
        ]);


    }
    public function getDatatablesData($type, Request $request)
    {
        switch ($type) {
            case 'index':
                return $this->getOrderDTData();
                break;
            case 'delete':
//                return $this->deleteNotaryDTData();
                break;
        }
    }
    protected function getOrderDTData()
    {

        $query = Order::all();


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
            ->addColumn('actions', function ($order) {
                return (string) view(' orders.partials.actions', compact('order'));
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
        $data = Order::select(
            'type',
            'is_business',
            'name',
            'company',
            'phone',
            'email',
            'service_address',
            'service_date',
            'service_time',
            'people',
            'packages',
            'service',
            'comment')
            ->get()
            ->toArray();

//        unset($data[0]['id']);
//        unset($data[0]['company_id']);

        return Excel::create('orders_export', function ($excel) use ($data) {
            $excel->sheet('orders', function ($sheet) use ($data) {
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
            $columns = $csv->getTableColumns('orders');

            $array = [];

            foreach ($columns as $value) {

                array_push($array, $value->Field);

            }
            $array = array_where($array, function ($value, $key) {

                $cols = ['id', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'is_new'];

                return !in_array($value, $cols);
            });


            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {

                foreach ($data->toArray() as $key => $value) {

                    if(!empty($value)){
                        //foreach ($value as $k => $v) {
                        $insert[] = [
                            'type' => $value['type'],
                            'is_business' => $value['is_business'],
                            'name' => $value['name'],
                            'company' => $value['company'],
                            'phone' => $value['phone'],
                            'email' => $value['email'],
                            'service_address' => $value['service_address'],
                            'service_date' => $value['service_date'],
                            'service_time' => $value['service_time'],
                            'people' => $value['people'],
                            'packages' => $value['packages'],
                            'service' => $value['service'],
                            'comment' => $value['comment'],
                            'is_new' => 0,
                            'user_id' => Auth::user()->id,
                        ];
                        //}
                    }
                }
                if(!empty($insert)){
                    foreach($insert as $order){
                        Order::create($order);
                    }
                    Session::flash('flash_message', 'Import Successful!');
                    return back();
                }
            }
        }
        return back()->with('error','Please Check your file, Something is wrong there.');

    }

    /**
     * PDF Invoices
     *
     *
     */
    public function pdf($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('pdf.order', ['order' => $order]);

        return $pdf->stream();
    }
}
