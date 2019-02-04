<?php

namespace App\Http\Controllers;

use App\Notifications\NewOnlineOrder;
use App\Notifications\NewOrder;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
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
        //
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
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
