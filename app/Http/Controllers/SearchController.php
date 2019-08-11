<?php

namespace App\Http\Controllers;

use App\Notary;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function findNotaryByEmail(Request $request)
    {
        $email = $request->email;

        $notary = Notary::where('email', $email)->first();

        if($notary) {
            return view('notaries.public', compact('notary'));
        } else {
            return view('notaries.new', compact('email'));
        }

    }
}
