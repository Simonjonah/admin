<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

use Flash;
class WithdrawalController extends Controller
{
    //\

    
    public function withdrawal() {

        // $findthe_franchise = Franchise::find($id); 

        return view('dashboard.franchise.withdrawal');
    }

    public function createwithdrawal(Request $request) {
    

        $addfranchise_withdrawal = Withdrawal::where('franchise_id', auth::guard('franchise')->id())->get();
        $request->validate([
            'account_number' => ['required', 'string', 'max:10'],           
        ]);
        
            Withdrawal::create([
                'franchise_id' => Auth::guard('franchise')->user()->id,
                'withdrawal_name'=> Auth::guard('franchise')->user()->name,
                'withdrawal_email'=> Auth::guard('franchise')->user()->email,
                'withdrawal_phone'=> Auth::guard('franchise')->user()->phone,
                'withdrawal_amount'=> request()->withdrawal_amount,
                'account_number'=> request()->account_number,
                'account_name'=> request()->account_name,
                'account_type'=> request()->account_type,
                'bank'=> request()->bank,  

            ]);

        return view('dashboard.franchise.withdrawal');
    }

   
    public function marketerwithdrawal() {
        
        return view('dashboard.marketer.marketerwithdrawal');
    }


   
}
