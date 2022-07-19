<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use App\Models\Buyer;
use App\Models\Marketer;
use App\Models\Primvideo;
use App\Models\Payment;
use App\Models\Franchise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;


class FlutterwaveController extends Controller
{
    
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                "id" => request()->id,
                'amount' => request()->amount,
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name,
                "subject" => request()->subject,
                "class" => request()->class,
                "reference" => request()->reference
            ],

            "customizations" => [
                "title" => "Hometeacher.ng",
                "description" => "20th October"
            ],
            "meta" => [
                // $buyers = Buyer::where('id', Auth::guard('buyer')->user()->id)->first(),
                // $payment->marketer_id = $buyers->marketer_id,
                // $payment->franchise_id = $buyers->franchise_id,
                "id" => request()->id,
                "buyer_id" => Auth::guard('buyer')->user()->id,
                // "marketer_id" => Auth::guard('marketer')->user()->id,
                // "franchise_id" => Auth::guard('franchise')->user()->id,
                'amount' => request()->amount,
                "subject" => request()->subject,
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name,
                "class" => request()->class,
                "video" => request()->video,

                
            ],

            
            // $marketers = Payment::where('id', auth::guard('marketer')->id() && Auth::guard('franchise')->id())->get(),
            //  Transaction::create([
            // 'amount' => request()->amount,
            // 'franchise_share' => 100,
            // 'marketer_share' => 200,
            // "video" => request()->video,
            // 'marketer_name' => Auth::guard('marketer')->user()->firstname,
            // 'marketer_phone' => Auth::guard('marketer')->user()->phone,
            // 'marketer_email' => Auth::guard('marketer')->user()->email,
            // 'franchise_name' => Auth::guard('franchise')->user()->name,
            // 'franchise_phone' => Auth::guard('franchise')->user()->phone,
            // 'franchise_email' => Auth::guard('franchise')->user()->email,
            // 'buyer_name' => Auth::guard('buyer')->user()->name,
            // 'email' => Auth::guard('buyer')->user()->email,
            // 'phone' => Auth::guard('buyer')->user()->phone,
            // 'payment_id' => Auth::guard('buyer')->user()->id,
            // 'franchise_id' => Auth::guard('franchise')->user()->id,
            // 'marketer_id' => Auth::guard('marketer')->user()->id,
                
            //  ]),


 
        ];
        
        $payment = Flutterwave::initializePayment($data);
        // Account::where('id', $account->id)->update([
        //     'applied_for_payout'=>0,
        //      'paid'=>1,
             
        // ]);
        // if ($payment['status'] == 'success') {
        //     $marketers = Payment::where('marketer_id', auth::guard('marketer')->id())->get();
        //      Marketer::update([
        //          'balance' => 200,
        //      ]);
        // }
        // if ($payment['status'] !== 'success') {
        //     // notify something went wrong
        //     Flash::success('Payment Failed');
        //     $buyer = Payment::find($payment['data']['link']);
        //     return redirect()->route('singlesubject',['id'=>$payment['data']['meta']['primvideo_id']]);
        //     if($buyer->amount != ($payment['data']['amount'])) {
    
        //         Flash::success('Sorry, you are trying to pay lesser amount');
        //     return redirect()->route('singlesubject',['id'=>$payment['data']['primvideo_id']]);
    
        //     }
        // }


        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        // $marketers = Payment::where('id', auth::guard('marketer')->id() && Auth::guard('franchise')->id())->get();
        //     Payment::create([
            
        //     'primvideo_id' => $single_videos->id,
        //     'buyer_id' => Auth::guard('buyer')->user()->id,
        //     'marketer_id' => Auth::guard('marketer')->user()->id,
        //     'franchise_id' => Auth::guard('franchise')->user()->id,
        //     //'amount'=> request()->$single_videos->amount,
        //     'name' => Auth::guard('buyer')->user()->name,
        //     //'subject' =>request()->$single_videos->subject,
        //     // 'class' =>request()->class,
        //     // 'video' =>request()->video,
        //     'phone_number' =>Auth::guard('buyer')->user()->phone,
        //     'email' =>Auth::guard('buyer')->user()->email,
           
        // ]);

        //dd($data);
            return view('dashboard.buyer.thankyou');
        
        }
        
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        //return view('dashboard.buyer.home'); 

        
        
    }

    
}


