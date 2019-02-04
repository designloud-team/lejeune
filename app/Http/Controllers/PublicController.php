<?php

namespace App\Http\Controllers;

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
            case 'notaries':
                return view('notaries');
            case 'contact':
                return view('contact');
            default:
                return view('home');
        }
    }

}
