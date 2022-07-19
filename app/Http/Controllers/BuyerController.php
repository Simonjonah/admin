<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Repositories\BuyerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BuyerController extends AppBaseController
{
    /** @var BuyerRepository $buyerRepository*/
    private $buyerRepository;

    public function __construct(BuyerRepository $buyerRepo)
    {
        $this->buyerRepository = $buyerRepo;
    }

    /**
     * Display a listing of the Buyer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $buyers = $this->buyerRepository->all();

        return view('buyers.index')
            ->with('buyers', $buyers);
    }

    /**
     * Show the form for creating a new Buyer.
     *
     * @return Response
     */
    public function create()
    {
        return view('buyers.create');
    }

    /**
     * Store a newly created Buyer in storage.
     *
     * @param CreateBuyerRequest $request
     *
     * @return Response
     */
    public function store(CreateBuyerRequest $request)
    {
        $input = $request->all();

        $buyer = $this->buyerRepository->create($input);

        Flash::success('Buyer saved successfully.');

        return redirect(route('buyers.index'));
    }

    /**
     * Display the specified Buyer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buyer = $this->buyerRepository->find($id);

        if (empty($buyer)) {
            Flash::error('Buyer not found');

            return redirect(route('buyers.index'));
        }

        return view('buyers.show')->with('buyer', $buyer);
    }

    /**
     * Show the form for editing the specified Buyer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buyer = $this->buyerRepository->find($id);

        if (empty($buyer)) {
            Flash::error('Buyer not found');

            return redirect(route('buyers.index'));
        }

        return view('buyers.edit')->with('buyer', $buyer);
    }

    /**
     * Update the specified Buyer in storage.
     *
     * @param int $id
     * @param UpdateBuyerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuyerRequest $request)
    {
        $buyer = $this->buyerRepository->find($id);

        if (empty($buyer)) {
            Flash::error('Buyer not found');

            return redirect(route('buyers.index'));
        }

        $buyer = $this->buyerRepository->update($request->all(), $id);

        Flash::success('Buyer updated successfully.');

        return redirect(route('buyers.index'));
    }

    /**
     * Remove the specified Buyer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buyer = $this->buyerRepository->find($id);

        if (empty($buyer)) {
            Flash::error('Buyer not found');

            return redirect(route('buyers.index'));
        }

        $this->buyerRepository->delete($id);

        Flash::success('Buyer deleted successfully.');

        return redirect(route('buyers.index'));
    }
}
