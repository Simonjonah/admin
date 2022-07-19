<?php

namespace App\Http\Controllers\Markerter;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Markerter\MarketerController;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Marketer;
use App\Models\Franchise;
use App\Models\Marwithdrawal;
use App\Models\Buyer;
use Flash;
use Cookie;
use DB;
use Illuminate\Support\Facades\Auth;

class MarketerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function ref(Request $request) {
     

    

   
   // $request = Cookie::get('referral_link');
        //create method
        $request->validate([
           
            'username' => ['required', 'string', 'unique:marketers', 'alpha_dash', 'min:3', 'max:30'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],

            'phone' => ['required', 'string', 'unique:marketers', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:marketers'],
            'password' => ['required', 'string', 'min:8'],
            'terms' => ['required', 'string'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
           
        ]);
        // $findthefranchise = Franchise::where('id', $id)->first();
        $marketer = new Marketer();
        $franchise = Franchise::where('username', $request->ref)->first();
        $marketer->franchise_id = $franchise? $franchise->id:null;
        
        $marketer->firstname = $request->firstname;
        $marketer->lastname = $request->lastname;

        $marketer->phone = $request->phone;

        $marketer->username = $request->username;
        //$lost = $register::where('type', 'Lost')->count();
        $marketer->email = $request->email;
        $marketer->terms = $request->terms;        
        $marketer->password = \Hash::make($request->password);
        $marketer->balance = 0;
           
        $marketer->marketer_count = $request->marketer_count + 1;
        
      
        $marketer->save();
       
        if ($marketer) {
          
               return redirect()->route('marketer.home');
            }else{
                return redirect()->back()->with('you have fail to registered');
        }


    }
    

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:marketers'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the marketers table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('marketer')->attempt($creds)) {
            return redirect()->route('marketer.home');
        }else{
            return redirect()->route('marketer.login')->with('Failed to login');
        }

       
    }
    public function home(){

        $buyer_counts = Buyer::where('marketer_id', auth::guard('marketer')->id())->count();
        $marketershare_counts = Auth::guard('marketer')->user()->payments->sum('marketer_share');
        $markerwithdrawl_counts = Marwithdrawal::where('marketer_id', auth::guard('marketer')->id())->count();
        $marketerwithdrawalshare_counts = Auth::guard('marketer')->user()->marwithdrawals->sum('withdrawal_amount');


        // Marwithdrawal::where('id', $transaction->id)->update([
        //     'applied_for_payout'=>1,
        //      'paid'=>0,
             
        // ]);
        return view('dashboard.marketer.home')->with('buyer_counts', $buyer_counts)
        ->with('marketershare_counts', $marketershare_counts)
        ->with('markerwithdrawl_counts', $markerwithdrawl_counts)
        ->with('marketerwithdrawalshare_counts', $marketerwithdrawalshare_counts);
    }


    public function access(){
        //$marketers = Marketer::all();
       
    $title = 'The Franchise Information';
   
       return view('dashboard.marketer.access')->with('marketers', $marketers);
    }

    
    public function marketerprofile () {

        
        $buyer_counts = Buyer::where('marketer_id', auth::guard('marketer')->id())->count();
        $marketershare_counts = Auth::guard('marketer')->user()->payments->sum('marketer_share');
        $markerwithdrawl_counts = Marwithdrawal::where('marketer_id', auth::guard('marketer')->id())->count();
        $marketerwithdrawalshare_counts = Auth::guard('marketer')->user()->marwithdrawals->sum('withdrawal_amount');


        // Marwithdrawal::where('id', $transaction->id)->update([
        //     'applied_for_payout'=>1,
        //      'paid'=>0,
             
        // ]);
        return view('dashboard.marketer.marketerprofile')->with('buyer_counts', $buyer_counts)
        ->with('marketershare_counts', $marketershare_counts)
        ->with('markerwithdrawl_counts', $markerwithdrawl_counts)
        ->with('marketerwithdrawalshare_counts', $marketerwithdrawalshare_counts);

        
    }
    public function yourbuyers(){
       // $buyermarketers = Buyer::all();
        $buyermarketers = Buyer::where('marketer_id', auth::guard('marketer')->id())->get();
        $buyer_counts = Buyer::where('marketer_id', auth::guard('marketer')->id())->count();

        
       return view('dashboard.marketer.yourbuyers')->with('buyermarketers', $buyermarketers)->with('buyer_counts', $buyer_counts);
    }

   
    public function profile(){


        return view('dashboard.marketer.profile');
    }

    public function allbuyers() {

        $allbuyers = Buyer::all();
        //$allbuyers = Buyer::where('marketer_id', auth::guard('marketer')->id())->get();
        return view('marketers.allbuyers')->with('allbuyers', $allbuyers);
    }
    public function marketerref() {

        $yourmarketers = Franchise::where('id', auth::guard('marketer')->id())->get();

        return view('dashboard.marketer.marketerref')->with('yourmarketers', $yourmarketers);
    }
   
    public function marketerwithdrawalhistory(){

        return view('dashboard.marketer.marketerwithdrawalhistory');
    }
    
    public function logout(){
        Auth::guard('marketer')->logout();
        return redirect('/');
    }  
}
