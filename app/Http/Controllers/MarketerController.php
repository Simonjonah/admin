<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarketerRequest;
use App\Http\Requests\UpdateMarketerRequest;
use App\Repositories\MarketerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Buyer\BuyerController;
use Flash;
use Response;
use App\Models\Marketer;
use App\Models\Buyer;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Marwithdrawal;



class MarketerController extends AppBaseController
{
    /** @var MarketerRepository $marketerRepository*/
    private $marketerRepository;

    public function __construct(MarketerRepository $marketerRepo)
    {
        $this->marketerRepository = $marketerRepo;
    }

    /**
     * Display a listing of the Marketer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $marketers = $this->marketerRepository->all();
        //$marketers = Buyer::where('id', auth::guard('marketer')->id())->get();



        return view('marketers.index')
            ->with('marketers', $marketers);
    }

    /**
     * Show the form for creating a new Marketer.
     *
     * @return Response
     */
    public function create()
    {
        return view('marketers.create');
    }

    /**
     * Store a newly created Marketer in storage.
     *
     * @param CreateMarketerRequest $request
     *
     * @return Response
     */
    public function store(CreateMarketerRequest $request)
    {
        $input = $request->all();

        $marketer = $this->marketerRepository->create($input);

        Flash::success('Marketer saved successfully.');

        return redirect(route('marketers.index'));
    }

    

    /**
     * Display the specified Marketer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marketer = $this->marketerRepository->find($id);

        if (empty($marketer)) {
            Flash::error('Marketer not found');

            return redirect(route('marketers.index'));
        }

        return view('marketers.show')->with('marketer', $marketer);
    }
    
    
    
    /**
     * Show the form for editing the specified Marketer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marketer = $this->marketerRepository->find($id);

        if (empty($marketer)) {
            Flash::error('Marketer not found');

            return redirect(route('marketers.index'));
        }

        return view('marketers.edit')->with('marketer', $marketer);
    }

    /**
     * Update the specified Marketer in storage.
     *
     * @param int $id
     * @param UpdateMarketerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarketerRequest $request)
    {
        $marketer = $this->marketerRepository->find($id);

        if (empty($marketer)) {
            Flash::error('Marketer not found');

            return redirect(route('marketers.index'));
        }

        $marketer = $this->marketerRepository->update($request->all(), $id);

        Flash::success('Marketer updated successfully.');

        return redirect(route('marketers.index'));
    }

    /**
     * Remove the specified Marketer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marketer = $this->marketerRepository->find($id);

        if (empty($marketer)) {
            Flash::error('Marketer not found');

            return redirect(route('marketers.index'));
        }

        $this->marketerRepository->delete($id);

        Flash::success('Marketer deleted successfully.');

        return redirect(route('marketers.index'));
    }

    public function allmarketer() {

        $allmarketers = Marketer::all();
        
        return view('marketers.allmarketer')->with('allmarketers', $allmarketers);
    }

    public function alltransactions() {
        $allthe_transactions = Payment::all();
        $allthe_transactions_counts = Payment::count();


        return view('marketers.alltransactions')->with('allthe_transactions', $allthe_transactions)
        ->with('allthe_transactions_counts', $allthe_transactions_counts);
    }

    public function buyerofmarketer(){
        $buyersofmarketers = Buyer::where('marketer_id', auth::guard('marketer')->id())->get();
        //dd($buyersofmarketers);
        return view('marketers.buyerofmarketer')->with('buyersofmarketers', $buyersofmarketers);
    }

    public function viewpayment(Request $request, $id) {

        $findpayments = Payment::find($id);

        return view('marketers.viewpayment')->with('findpayments', $findpayments);
    }

    public function transumary() {
        //$transummarys = Auth::guard('buyer')->user()->payments->sum('franchise_share');
        
        $transummarys = Payment::sum('amount');
        $totalfranchise_shares = Payment::sum('franchise_share');
        $totalmarketer_shares = Payment::sum('marketer_share');


        return view('marketers.transumary')->with('transummarys', $transummarys)
        ->with('totalfranchise_shares', $totalfranchise_shares)
        ->with('totalmarketer_shares', $totalmarketer_shares);
    }

    public function withdrawaltable() {
        $allthe_withdrawals = Withdrawal::all();
        return view('marketers.withdrawaltable')->with('allthe_withdrawals', $allthe_withdrawals);
    }
    public function marwithdrawaltable() {
        $allthe_marketerswithdrawals = Marwithdrawal::all();
        // $franchiseshare_counts = Auth::guard('franchise')->user()->payments->sum('franchise_share');

        return view('marketers.marwithdrawaltable')->with('allthe_marketerswithdrawals', $allthe_marketerswithdrawals);
    }


    
    
}
