<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketer;
use App\Models\Buyer;
use App\Models\Franchise;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Marwithdrawal;

use Illuminate\Support\Facades\Auth;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $franchise_counts = Franchise::count();
        $marketer_counts = Marketer::count();
        $buyer_counts = Buyer::count();
        $payment_counts = Payment::count();
        $withdrawal_counts = Withdrawal::count();
        $markerterwithdrawal_counts = Marwithdrawal::count();

        $afranchises = Marketer::all();
       
        $buyermarketers = Buyer::where('marketer_id', Auth::guard('marketer')->id())->get();


        return view('home')->with('afranchises', $afranchises)
        ->with('franchise_counts', $franchise_counts)->with('buyer_counts', $buyer_counts)
        ->with('marketer_counts', $marketer_counts)->with('payment_counts', $payment_counts)
        ->with('buyermarketers', $buyermarketers)->with('withdrawal_counts', $withdrawal_counts)
        ->with('markerterwithdrawal_counts', $markerterwithdrawal_counts);

    }

    public function buyerstable() {
        $allthebuyers = Buyer::all();
        return view('marketers.buyerstable')->with('allthebuyers', $allthebuyers);
    }

    public function marketerstable() {
        $allthemarketers = Marketer::all();
        return view('marketers.marketerstable')->with('allthemarketers', $allthemarketers);
    }

    public function frachisetable() {
        $allthefranchises = Franchise::all();
        //$franchiseshare_counts = Payment::all()->sum('franchise_share');
        // $franchiseshare_counts = Payment::where('franchise_id')->payments->sum('franchise_share');
        // dd($franchiseshare_counts);
        return view('marketers.frachisetable')->with('allthefranchises', $allthefranchises);
    }


    
    public function logout(){
        Auth::user()->logout();
        return redirect('/');
    }


   

}
