<?php

namespace App\Http\Controllers;

use App\Notary;
use Session;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //
    public function getpage(Request $request)
    {
        switch($request->path()) {
            case 'about':
                return view('about');
            case 'orders':
                return view('orders');
            case 'services':
                return view('services');
            case 'notary-registration':
                return view('notaries');
            case 'contact':
                return view('contact');
            default:
                return view('home');
        }
    }

    public function saveNotary(Request $request)
    {
        $request->validate([
            'email' => ['unique:notaries'],
        ]);
        $data = $request->all();

        if(!isset($request->delivery_address)) {
            $data['delivery_address'] = $data['mailing_address'];
        }
        $notary = Notary::create($data);

        Session::flash('flash_message', 'Notary Saved');

        return redirect()->back();
    }

}
