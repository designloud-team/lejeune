<?php

namespace App\Http\Controllers;

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
        if(!isset($request->delivery_address)) {
            $data['delivery_address'] = $data['mailing_address'];
        }
        $notary = Notary::create($data);

        return view('notaries.show', compact('notary'));
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

        return view('notaries.edit', compact('notary'));
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

        return view('notaries.show', compact('notary'));
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

}
