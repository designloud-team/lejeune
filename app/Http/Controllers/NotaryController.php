<?php

namespace App\Http\Controllers;

use App\Notary;
use Illuminate\Http\Request;

class NotaryController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function show(Notary $notary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function edit(Notary $notary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notary $notary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notary  $notary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notary $notary)
    {
        //
    }
}
