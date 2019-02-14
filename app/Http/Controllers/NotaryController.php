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
        //
        if (request()->wantsJson()) {
//            return \GuzzleHttp\json_encode($this->getDatatablesData()->getData());

            return response()->json($this->getDatatablesData()->getData());
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
        $data = $request->all();

        dd($data);
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

        return view('notaries.show', compact('notary'));
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

        return view('notaries.show', compact('notary'));
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

        dd($data);
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

        return $status == 1? true : false;
    }
    protected function getDatatablesData()
    {

        $query = Notary::all();

        return Datatables::of($query)
            ->addColumn('actions', function ($notary) {
                return (string) view(' notaries.partials.actions', compact('notary'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
