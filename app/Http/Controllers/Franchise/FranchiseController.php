<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\Marketer;
use App\Models\Transaction;

use App\Models\Buyer;
use App\Models\Withdrawal;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Markerter\MarketerController;
use Flash;

class FranchiseController extends Controller
{
    //

    public function create(Request $request) {
        //create method
        $request->validate([
            'username' => ['required', 'string', 'unique:franchises', 'alpha_dash', 'min:3', 'max:30'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:franchises', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:franchises'],
            'password' => ['required', 'string', 'min:8'],
            'terms' => ['required', 'string'],
            'marketer_count' => ['nullable', 'string'],
            'franchise_state' => ['nullable', 'string'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
           
        ]);
        
        $franchise = new Franchise();
        

        $franchise->name = $request->name;
        $franchise->phone = $request->phone;

        $franchise->username = $request->username;

        $franchise->email = $request->email;
        $franchise->terms = $request->terms;
        $franchise->franchise_state = $request->franchise_state;
        $franchise->marketer_count = $request->marketer_count;
        $franchise->password = \Hash::make($request->password);
        $franchise->balance = 0;
        $franchise->save();
        //return 'you have created your marketer';
        if ($franchise) {
            return redirect()->route('franchise.home')->with('you have successfully registered');
                
            }else{
                return redirect()->back()->with('you have fail to registered');
        }
    }

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:franchises'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the franchises table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('franchise')->attempt($creds)) {
            return redirect()->route('franchise.home');
        }else{
            return redirect()->route('franchise.login')->with('Failed to login');
        }
    }

    public function addPost() {
        $post = new Franchise();
        $post->name =  "dn Port";
        $post->username = "Mfon";
        $post->phone = "08133939965";
        $post->terms = "agree";
        $post->email = "simoudfjjian@gmail.com";
        $post->password = \Hash::make($post->password);
        $post->marketer_count = "3";
        $post->save();
        return 'post has been created';
    }

    public function addMarketer($id) {

        $post = Franchise::find($id);
        $marketer = new Marketer();
        $marketer->firstname = "Idongesit";
        $marketer->lastname = "Akpan";
        $marketer->terms = "agree";
        $marketer->email = "gdongesit@gmail.com";
        $marketer->phone = "08339933883";
        $marketer->username = "hdoemo";
        $marketer->password = \Hash::make($marketer->password);

        $post->marketers()->save($marketer);
       
        return 'you have registered sucessfully';
    }


    public function yourmarketers(){

        $marketers = Marketer::where('franchise_id', auth::guard('franchise')->id())->get();
        $marketers = auth()->user()->marketers;
        $marketer_counts = Marketer::where('franchise_id', auth::guard('franchise')->id())->count();
      
        return view('dashboard.franchise.yourmarketers')->with('marketers', $marketers)->with('marketer_counts', $marketer_counts);
    }
    
    public function home(){

        $marketer_counts = Marketer::where('franchise_id', auth::guard('franchise')->id())->count();
        $franchiseshare_counts = Auth::guard('franchise')->user()->payments->sum('franchise_share');
        $franchisewithdrawal_amount_counts = Auth::guard('franchise')->user()->withdrawals->sum('withdrawal_amount');
        
        $franchisewithdrawal_counts = Withdrawal::where('franchise_id', auth::guard('franchise')->id())->count();
        
        return view('dashboard.franchise.home')->with('marketer_counts', $marketer_counts)
        ->with('franchiseshare_counts', $franchiseshare_counts)
        ->with('franchisewithdrawal_counts', $franchisewithdrawal_counts)
        ->with('franchisewithdrawal_amount_counts', $franchisewithdrawal_amount_counts);
    }
    
    public function access() {
    //$marketers = Marketer::with('franchise')->get();
     $marketers = Marketer::where('franchise_id', auth::guard('franchise')->id())->get();
     $marketers = auth()->user()->marketers;

        
        return view('dashboard.franchise.access')->with('marketers', $marketers);
    }

    public function allfrachise() {
        //$findfranchises = Franchise::find($id);

        $allfranchises = Marketer::all();
        //$allfranchises = Marketer::where('franchise_id', auth::guard('franchise')->id())->get();
        
        return view('marketers.allfrachise')->with('allfranchises', $allfranchises);
        
    }

    public function franchisemarketers($id) {
        $findfranchises = Marketer::find($id);
        // 

        //$marketers = Franchise::where('id', auth::guard('marketer')->id())->get();
        $buyermarketers = Buyer::where('marketer_id', auth::guard('marketer')->id())->get();
        //$marketers = Marketer::where('franchise_id', auth::guard('franchise')->id())->get();
        $buyer_counts = Buyer::where('marketer_id', auth::guard('marketer')->id())->count();



        return view('marketers.franchisemarketers')
        ->with('findfranchises', $findfranchises)
        ->with('buyermarketers', $buyermarketers)
        ->with('buyer_counts', $buyer_counts); 
    }
    
    public function withdrawalhistory() {
        $franchise_withdrawals = Withdrawal::where('franchise_id', auth::guard('franchise')->id())->get();
        
        return view('dashboard.franchise.withdrawalhistory')->with('franchise_withdrawals', $franchise_withdrawals);
    }


    public function franchiseprofile() {

        
        $marketer_counts = Marketer::where('franchise_id', auth::guard('franchise')->id())->count();
        $franchiseshare_counts = Auth::guard('franchise')->user()->payments->sum('franchise_share');
        $franchisewithdrawal_amount_counts = Auth::guard('franchise')->user()->withdrawals->sum('withdrawal_amount');
        
        $franchisewithdrawal_counts = Withdrawal::where('franchise_id', auth::guard('franchise')->id())->count();
        
        return view('dashboard.franchise.franchiseprofile')->with('marketer_counts', $marketer_counts)
        ->with('franchiseshare_counts', $franchiseshare_counts)
        ->with('franchisewithdrawal_counts', $franchisewithdrawal_counts)
        ->with('franchisewithdrawal_amount_counts', $franchisewithdrawal_amount_counts);

    }

    public function logout(){
        Auth::guard('franchise')->logout();
        return redirect('/');
    }


}
