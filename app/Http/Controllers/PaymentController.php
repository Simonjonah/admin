<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PrimvideoController;
use App\Http\Controllers\Marketer\MarkerterController;
use App\Models\Primvideo;
use App\Models\Payment;
use App\Models\Marketer;
use App\Models\Franchise;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function index(Request $request, $id){

        $single_videos = Primvideo::find($id);
        $payment = new Payment();
        $buyers = Buyer::where('id', Auth::guard('buyer')->user()->id)->first();
        $payment->marketer_id = $buyers->marketer_id;
        $payment->franchise_id = $buyers->franchise_id;


        $payment->primvideo_id = $single_videos->id;
        $payment->franchise_share = 100;
        $payment->marketer_share =  250;
        $payment->amount = $single_videos->amount;
        $payment->buyer_id = Auth::guard('buyer')->user()->id;
        $payment->name = Auth::guard('buyer')->user()->name;
        $payment->subject = $single_videos->subject;
        $payment->class = $single_videos->class;
        $payment->video = $single_videos->video;
        $payment->phone_number = Auth::guard('buyer')->user()->phone;
        $payment->email = Auth::guard('buyer')->user()->email;
        $payment->reference = $single_videos->reference;
        $payment->save();
    

        return view('dashboard.buyer.payment')->with('single_videos', $single_videos);
    }

    

    public function subjectpayment() {
        $subject_payments = Payment::all();
        
        return view('marketers.subjectpayment')->with('subject_payments', $subject_payments);
    }


    public function viewbuyer(Request $request, $id) {
        $view_buyers = Buyer::find($id);
        return view('marketers.viewbuyer')->with('view_buyers', $view_buyers);
    }

    

}
