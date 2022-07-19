<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marwithdrawal;
use Illuminate\Support\Facades\Auth;

class MarwithdrwalController extends Controller
{
    //
    public function marketerwithdrawal(){

        return view('dashboard.marketer.marketerwithdrawal');
    }
    
    public function createmarketerwithdrawal(Request $request) {
    

        $addmarkerter_withdrawals = Marwithdrawal::where('marketer_id', auth::guard('marketer')->id())->get();
        $request->validate([
            'account_number' => ['required', 'string', 'max:10'],           
        ]);

        $addmarkerter_withdrawals = new Marwithdrawal();
        $addmarkerter_withdrawals->withdrawal_name = Auth::guard('marketer')->user()->firstname;
        $addmarkerter_withdrawals->withdrawal_email = Auth::guard('marketer')->user()->email;
        $addmarkerter_withdrawals->marketer_id = Auth::guard('marketer')->user()->id;
        $addmarkerter_withdrawals->account_number = $request->account_number;
        $addmarkerter_withdrawals->account_name = $request->account_name;
        $addmarkerter_withdrawals->account_name = $request->account_name;
        $addmarkerter_withdrawals->withdrawal_phone = Auth::guard('marketer')->user()->phone;
        $addmarkerter_withdrawals->withdrawal_amount = request()->withdrawal_amount;
        $addmarkerter_withdrawals->account_type = request()->account_type;
        $addmarkerter_withdrawals->bank = request()->bank;

    
        $addmarkerter_withdrawals->save();
        if ($addmarkerter_withdrawals) {
            return redirect(route('marketer.home'))->with('you have successfully registered');
        }
          
    }


    public function marketerwithdrawalhistory(){
        $rmarketer_withdrawalcounts = Marwithdrawal::where('marketer_id', auth::guard('marketer')->id())->get();

        return view('dashboard.marketer.marketerwithdrawalhistory')->with('rmarketer_withdrawalcounts', $rmarketer_withdrawalcounts);
    }

    

    public function marwithdrawaltables() {

        return view('marketers.marwithdrawaltables');
    }

    public function marwithdrawaltable(Request $request ) {
    $markaspaids = Marwithdrawal::where('id','=',$id)->update(['markaspaid'=>1]);
    

    if($markaspaids){
 
      $markaspaids->approved=true;
      return redirect()->back()->with('info','The withdrawal was approved successfully');
    }
 }
    
}
