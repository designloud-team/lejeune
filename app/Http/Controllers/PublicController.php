<?php

namespace App\Http\Controllers;

use App\Job;
use App\Notary;
use App\Notifications\NotaryVerificationEmail;
use App\Report;
use Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //
    public function getpage(Request $request)
    {
        switch($request->path()) {
            case 'about':
                return view('about');
            case 'order':
                return view('orders');
            case 'services':
                return view('services');
            case 'notary-registration':
                return view('notaries');
            case 'contact':
                return view('contact');
            case 'signin':
                return view('signin');
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
    public function verify($id)
    {

        $notary = Notary::findOrFail($id);

        if ($notary) {

            $notary->notify(new NotaryVerificationEmail($notary));

            return response()->json(['message' => 'Verification Email Sent']);
        }

    }
    public function findNotaryByLast(Request $request)
    {

        $job = Job::where('registered_id', '=',$request->job)->value('id');
        $report = Report::where('job_id', '=',$job)->first();
        if ($report ) {
            return view('report', compact('report'), ['job' => Job::find($job)]);
        } else {
            return back()->with('error' , 'No Report Found');

        }

    }
    public function submitReport(Request $request)
    {
        $report = Report::where('job_id', '=',$request->job)->first();

        $data =$request->all();

        $report->update($data);

        return view('thanks');

    }

}
