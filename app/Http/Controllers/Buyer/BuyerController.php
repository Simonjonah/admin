<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\FranchiseController;

use App\Http\Controllers\SecondvideoController;
use App\Models\Primvideo;
use App\Models\Secondvideo;
use App\Models\Marketer;
use App\Models\Franchise;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class BuyerController extends Controller
{
    
    public function ref(Request $request) {
        //create method
        $request->validate([
            'username' => ['required', 'string', 'unique:buyers', 'alpha_dash', 'min:3', 'max:30'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:buyers'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
        ]);
        
        
        $buyer = new Buyer();
        $marketer = Marketer::where('username', $request->ref)->first();
        $buyer->marketer_id = $marketer? $marketer->id:null;
        $buyer->franchise_id = $marketer? $marketer->franchise_id:null;
        $buyer->name = $request->name;
        $buyer->phone = $request->phone;
        $buyer->username = $request->username;

        $buyer->email = $request->email;
        $buyer->password = \Hash::make($request->password);
        $buyer->buyer_count = $request->buyer_count + 1;
        $buyer->save();

        if ($buyer) {
            return redirect()->route('buyer.home');

            }else{
                return redirect()->back()->with('you have fail to registered');
        }
    }


    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:buyers'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the buyers table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('buyer')->attempt($creds)) {
            return redirect()->route('buyer.home');
        }else{
            return redirect()->route('buyer.login')->with('Failed to login');
        }
    }

    public function buyerprofile(){
        $subjectpayment_counts = Auth::guard('buyer')->user()->payments->sum('amount');
        $buyerpayments = Payment::where('buyer_id', auth::guard('buyer')->id())->count();
        $primvideos = Primvideo::count();
        $secondary_counts = Secondvideo::count();
        

       return view('dashboard.buyer.buyerprofile')
       ->with('buyerpayments', $buyerpayments)->with('subjectpayment_counts', $subjectpayment_counts)
       ->with('primvideos', $primvideos)->with('secondary_counts', $secondary_counts);
    }

    public function buyertransactions() {
       $view_payment_buyers = Payment::where('buyer_id', auth::guard('buyer')->user()->id)
       ->join('primvideos', 'primvideos.subject', '=', 'payments.subject')
       ->get();
        return view('dashboard.buyer.buyertransactions')->with('view_payment_buyers', $view_payment_buyers);
    }
    public function primary1subjects (Request $request, $subject) {
            $find_otherrelated_subjects = Payment::find($subject);

        return view('dashboard.buyer.primary1subjects')->with('find_otherrelated_subjects', $find_otherrelated_subjects);
    }
    public function buyprimvideos(){
        
            $primaryvideos = Primvideo::latest()->get();
        return view('dashboard.buyer.buyprimvideos')->with('primaryvideos', $primaryvideos);
    }

    public function buysecondaryvideos() {
        $secondaryvideos = Secondvideo::latest()->get();
        return view('dashboard.buyer.buysecondaryvideos')->with('secondaryvideos', $secondaryvideos);
    }

    public function secondarysingle($id) {
        $secondarysingle_videos = Secondvideo::find($id);
        return view('dashboard.buyer.secondarysingle')->with('secondarysingle_videos', $secondarysingle_videos);

    }


    public function home(){
        
        $primaryvideos = Primvideo::latest()->limit(3)->get();
       

        return view('dashboard.buyer.home')->with('primaryvideos', $primaryvideos);
    }

   
    public function singlesubject($id){
        
        $single_videos = Primvideo::find($id);
        
        return  view('dashboard.buyer.singlesubject')->with('single_videos', $single_videos);
    }



    public function primary1g2(){
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount', 'prim_topic')
        ->where('class', 'Primary 1/ Preparatory1')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary1g2')->with('primaryvideos', $primaryvideos);
    }
    public function primary1english(){
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount', 'prim_topic')
        ->where('class', 'Primary 1/ Preparatory1')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary1english')->with('primaryvideos', $primaryvideos);
    }
    public function primary1Quantitative(){
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount', 'prim_topic')
        ->where('class', 'Primary 1/ Preparatory1')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary1Quantitative')->with('primaryvideos', $primaryvideos);
    }

    public function viewprim2subjects(){
       
        return view('dashboard.buyer.viewprim2subjects');
    }
    
    public function primary1Verbal(){
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'amount', 'prim_topic')
        ->where('class', 'Primary 1/ Preparatory1')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary1Verbal')->with('primaryvideos', $primaryvideos);
    }
    


    


    public function primary2g3() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'prim_topic', 'amount')
        ->where('class', 'Primary 2/ Grade 1')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary2g3')->with('primaryvideos', $primaryvideos);
    }
    public function primary2english() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'prim_topic', 'amount')
        ->where('class', 'Primary 2/ Grade 1')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary2english')->with('primaryvideos', $primaryvideos);
    }

    public function primary2Quantitative() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'prim_topic', 'amount')
        ->where('class', 'Primary 2/ Grade 1')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary2Quantitative')->with('primaryvideos', $primaryvideos);
    }
    public function primary2Verbal() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject', 'prim_topic', 'amount')
        ->where('class', 'Primary 2/ Grade 1')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary2Verbal')->with('primaryvideos', $primaryvideos);
    }



    public function viewprim3subjects() {
        
        return view('dashboard.buyer.viewprim3subjects');
    }
    
    public function primary3g4() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject',  'prim_topic', 'amount')
        ->where('class', 'Primary 3/ Grade 2')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary3g4')->with('primaryvideos', $primaryvideos);
    }

    public function primary3english() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject',  'prim_topic', 'amount')
        ->where('class', 'Primary 3/ Grade 2')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary3english')->with('primaryvideos', $primaryvideos);
    }

    public function primary3Quantitative() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject',  'prim_topic', 'amount')
        ->where('class', 'Primary 3/ Grade 2')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary3Quantitative')->with('primaryvideos', $primaryvideos);
    }

    public function primary3Verbal() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'subject',  'prim_topic', 'amount')
        ->where('class', 'Primary 3/ Grade 2')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary3Verbal')->with('primaryvideos', $primaryvideos);
    }
    public function viewprim4subjects() {
       
        return view('dashboard.buyer.viewprim4subjects');
    }
    
    public function primary4g5() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 4/ Grade 3')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary4g5')->with('primaryvideos', $primaryvideos);
    }

    public function primary4english() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 4/ Grade 3')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary4english')->with('primaryvideos', $primaryvideos);
    }

    public function primary4Quantitative() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 4/ Grade 3')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary4Quantitative')->with('primaryvideos', $primaryvideos);
    }

    public function primary4Verbal() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 4/ Grade 3')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary4Verbal')->with('primaryvideos', $primaryvideos);
    }

    public function viewprim5subjects() {

        return view('dashboard.buyer.viewprim5subjects');
    }
     public function primary5g6() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 5/ Grade 4')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary4g5')->with('primaryvideos', $primaryvideos);
    }

    public function primary5english() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 5/ Grade 4')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary5english')->with('primaryvideos', $primaryvideos);
    }

    public function primary5Quantitative() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 5/ Grade 4')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary5Quantitative')->with('primaryvideos', $primaryvideos);
    }
    public function primary5Verbal() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class', 'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 5/ Grade 4')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary5Verbal')->with('primaryvideos', $primaryvideos);
    }

    

    public function viewprim6subjects() {
   
        return view('dashboard.buyer.viewprim6subjects');
    }

    

    public function primary6() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class',  'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 6/ Grade 5')->where('subject', 'Mathematics')->get();
        return view('dashboard.buyer.primary6')->with('primaryvideos', $primaryvideos);
    }
    public function primary6english() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class',  'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 6/ Grade 5')->where('subject', 'English')->get();
        return view('dashboard.buyer.primary6english')->with('primaryvideos', $primaryvideos);
    }
    public function primary6Quantitative() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class',  'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 6/ Grade 5')->where('subject', 'Quantitative Analysis')->get();
        return view('dashboard.buyer.primary6Quantitative')->with('primaryvideos', $primaryvideos);
    }
    public function primary6Verbal() {
        $primaryvideos = DB::table('primvideos')->select('id', 'class',  'prim_topic', 'subject', 'amount')
        ->where('class', 'Primary 6/ Grade 5')->where('subject', 'Verbal')->get();
        return view('dashboard.buyer.primary6Verbal')->with('primaryvideos', $primaryvideos);
    }

    public function jss1subject() {
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 1')->get();
        return view('dashboard.buyer.jss1subject')->with('secondaryvideos', $secondaryvideos);
    }

    public function jss2subject(){
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 2')->get();
        return view('dashboard.buyer.jss2subject')->with('secondaryvideos', $secondaryvideos);
    }

    public function jss3subject(){
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'JSS 3')->get();
        return view('dashboard.buyer.jss2subject')->with('secondaryvideos', $secondaryvideos);
    }

    public function ss1subject() {
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 1')->get();
        return view('dashboard.buyer.ss1subject')->with('secondaryvideos', $secondaryvideos);
    }
    public function ss2subject() {
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 2')->get();
        return view('dashboard.buyer.ss2subject')->with('secondaryvideos', $secondaryvideos);
    }

    public function ss3subject() {
        $secondaryvideos = DB::table('secondvideos')->select('id', 'class', 'subject', 'amount')
        ->where('class', 'SSS 3')->get();
        return view('dashboard.buyer.ss3subject')->with('secondaryvideos', $secondaryvideos);
    }

    public function youref() {

        $buyers = Marketer::where('id', auth::guard('buyer')->id())->get();
        //$marketers = auth()->user()->marketers;

        return view('dashboard.buyer.youref')->with('buyers', $buyers);
    }

    public function register1(){

        return view('dashboard.buyer.register1');
    }

    public function checkreg1(Request $request){
              //create method
        $request->validate([
            'username' => ['required', 'string', 'unique:buyers', 'alpha_dash', 'min:3', 'max:30'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:buyers'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
        ]);
        
        $buyer = new Buyer();

        $buyer->name = $request->name;
        $buyer->phone = $request->phone;

        $buyer->username = $request->username;

        $buyer->email = $request->email;
        $buyer->password = \Hash::make($request->password);
        $buyer->save();

        if ($buyer) {
            return redirect()->route('buyer.home');

            }else{
                return redirect()->back()->with('you have fail to registered');
        }
        return view('dashboard.buyer.register1');
    }

    public function primarysection(){

        return view('dashboard.buyer.primarysection');
    }

    public function secondarysection (){

        return view('dashboard.buyer.secondarysection');
    }
    public function thankyou() {
        return view('dashboard.buyer.thankyou');
    }
    public function viewprim1subjects(){

        return view('dashboard.buyer.viewprim1subjects');
    }
    public function logout(){
        Auth::guard('buyer')->logout();
        return redirect('/');
    }

}
