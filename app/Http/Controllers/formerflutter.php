<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Flash;
use Auth;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use App\Models\Qrcode as QrcodeModel;
use App\Models\AccountHistory;



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
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Payment for Subject',
                "description" => "Being a payment made on online class"
            ]
        ];
       
        $payment = Flutterwave::initializePayment($data);

        if ($payment['status'] !== 'success') {
            Flash::success('Payment Failed');
            $qrcode = QrcodeModel::find($payment['data']['link']['qrcode_id']);
            //return redirect()->route('qrcodes.show',['id'=>$payment['data']['meta']['qrcode_id']]);
            if($qrcode->amount != ($payment['data']['amount'])) {
    
                Flash::success('Sorry, you are trying to pay lesser amount');
            return redirect()->route('qrcodes.show',['id'=>$payment['data']['qrcode_id']]);
    
            }
    
            //update transactions
            $transaction = Transaction::where('id', $payment['data']['transaction_id'])->first();
            Transaction::where('id', $payment['data']['transaction_id'])->update([
                'status'=> 'Completed']);
    
                //get the user transaction details
               $buyer = User::find($payment['data']['buyer_user_id']);
            //update account details
            $qrCodeOwnerAccount = Account::where('id', $qrcode->user_id)->first();
            Account::where('id', $qrcode->user_id)->update([
                'balance'=> ($qrCodeOwnerAccount->balance + $qrcode->amount),
                'total_credit'=>($qrCodeOwnerAccount->total_credit + $qrcode->amount),
            ]);
    
            AccountHistory::create([
                'user_id'=>$qrcode->user_id,
                'account_id'=>$qrCodeOwnerAccount->id,
                'message'=>'Recieved '.$transaction->payment_method.' payment from'.$buyer->email . 'for qrcode: '.$qrcode->subject,
            ]);
    
    
    
               //update buyer's account
               $buyerAccount = Account::where('id', $payment['data']['buyer_user_id'])->first();
               Account::where('id', $payment['data']['buyer_user_id'])->update([
                   'total_debit'=>($qrCodeOwnerAccount->total_credit + $qrcode->amount),
               ]);
       
               AccountHistory::create([
                   'user_id'=>$payment['data']['buyer_user_id'],
                   'account_id'=>$buyerAccount->id,
                   'message'=>'Paid '.$transaction->payment_method.' payment to'.$qrcode->user['email'] . 'for qrcode: '.$qrcode->subject,
               ]);
    
               return redirect(route('transactions.show', ['id'=> $transaction->id]));
            //return;
        }

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

        dd($data);
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

    }

   
}