<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Markerter\MarketerController;
use App\Models\Marketer;

use Flash;
use Response;
use Auth;
class TransactionController extends AppBaseController
{
    /** @var TransactionRepository $transactionRepository*/
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //only admins can be able to view all the transactions
        if(Auth::user()->role_id < 4) {
            Flash::success('Transactions by all users');
            $transactions = $this->transactionRepository->all();
        }else{
            Flash::success('My Transaction');
            $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->get();
        }

        return view('transactions.index')
            ->with('transactions', $transactions);
    }

    

    public function withdrawal(Request $request){
        $transaction = $this->transactionRepository->find($request->input('withdrawal'));
        
        if (empty($transaction)) {
                Flash::error('Account not found');
     
                return redirect()->back();
         }
        if(Auth::guard('marketer')->id != $transaction->marketer_id){
         Flash::error('Sorry, You cannot perform this operation because is not yours');
 
         return redirect()->back();
        }
 
        Account::where('id', $transaction->id)->update([
            'applied_for_payout'=>1,
             'paid'=>0,
             
        ]);
 
        AccountHistory::create([
            'marketer_id' =>Auth::guard('marketer')->id,
            'account_id' => $transaction->id,
            'message'=> 'Payment initiated by the account owner'
        ]);
 
        Flash::success('Application submitted Succesfully');
 
       // return redirect()->back();
       return 'come and get money';
        
     }
     

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        $transaction = $this->transactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param int $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
}
