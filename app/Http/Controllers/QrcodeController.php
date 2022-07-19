<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use App\Repositories\QrcodeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
//use Response;

use QRCode;
use App\Models\Qrcode as QrcodeModel;
use App\Models\Transaction;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Qrcode as QrcodeResource;
use App\Http\Resources\QrcodeCollection as QrcodeResourceCollection;
use ErrorException;
use Symfony\Component\HttpFoundation\Response;



class QrcodeController extends AppBaseController
{
    /** @var QrcodeRepository $qrcodeRepository*/
    private $qrcodeRepository;

    public function __construct(QrcodeRepository $qrcodeRepo)
    {
        $this->qrcodeRepository = $qrcodeRepo;
    }

    /**
     * Display a listing of the Qrcode.
     *
     * @param Request $request
     *
     * @return Response
     */
    
    public function index(Request $request)
    {
        
        //admins should see all the qrcodes
        if(!Auth::guest() && (Auth::user()->role_id < 4)) {
            $qrcodes = $this->qrcodeRepository->paginate(5);
        }else{
            $qrcodes = QrcodeModel::where('user_id', Auth::user()->id)->paginate(5);
        }

        if($request->expectsJson()) {
            return response([
                'data'=> new QrcodeResourceCollection($qrcodes)
            ], Response::HTTP_OK);
    

        }
       return view('qrcodes.index')
           ->with('qrcodes', $qrcodes);
    
    }
    
   public function show_payment_page(Request $request){

    $input = $request->all();

    $user = User::where('email', $input['email'])->first();
    if ($user) {
        $user = User::create([
            'name' => $input['email'],
            'email' => $input['email'],
            'password' => Hash::make($input['email']),
        ]);


    //get the qrcode details
    $qrcodes = QrcodeModel::where('id', $input['qrcode_id'])->first();
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'qrcode_id' => $qrcodes->id,
            'status' => 'initiated',
            'qrcode_owner_id'=> 'interger',
            'payment_method'=> 'flutterwave',
            'amount'=>$qrcodes->amount,
        ]);

    }

    return view('qrcodes.show_payment_page');

}

    /**
     * Show the form for creating a new Qrcode.
     *
     * @return Response
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created Qrcode in storage.
     *
     * @param CreateQrcodeRequest $request
     *
     * @return Response
     */
    public function store(CreateQrcodeRequest $request)
    {
        $input = $request->all();

        $qrcode = $this->qrcodeRepository->create($input);

        $file = 'qrcode/'.$qrcode->id.'.png';
        $newQrcode = QRCode::text('message')
        ->setSize(8)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();
        $input['qrcode_path'] = $file;

        $newQrcode = QrcodeModel::where('id', $qrcode->id)
        ->update(['qrcode_path' => $input['qrcode_path']]);

        if($newQrcode) {

            $getQrcode = QrcodeModel::where('id', $qrcode->id)->first(); 
            if($request->expectsJson()) {
                //changing the success reponse from the api
                return response([
                    'data'=> new QrcodeResource($getQrcode)
                ], Response::HTTP_CREATED); 
            }

            Flash::success('Qrcode saved successfully.');
        }

        return redirect(route('qrcodes.show', ['qrcode' => $qrcode]));
    }

    /**
     * Display the specified Qrcode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {   
        $qrcode = $this->qrcodeRepository->find($id);
        //HANDLE THE EXCEPTION IF THE QRCODES IS NOT
        if (empty($qrcode)) {
            if($request->expectsJson()) {
                throw new ErrorException();
            }
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }
        
        $transactions = $qrcode->transactions;
        
        if($request->expectsJson()) {
           // return new QrcodeResourceCollection($qrcode);
            //changing the success reponse from the api
            return response([
                'data'=> new QrcodeResourceCollection($qrcode)
            ], Response::HTTP_OK);
          
        }
        return view('qrcodes.show')->with('qrcode', $qrcode)
        ->with('transactions', $transactions);
    }

    /**
     * Show the form for editing the specified Qrcode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.edit')->with('qrcode', $qrcode);
    }

    /**
     * Update the specified Qrcode in storage.
     *
     * @param int $id
     * @param UpdateQrcodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQrcodeRequest $request)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $qrcode = $this->qrcodeRepository->update($request->all(), $id);
        
        $file = 'qrcode/'.$qrcode->id.'.png';
        $newQrcode = QRCode::text('message')
        ->setSize(8)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();
        $input['qrcode_path'] = $file;

        $newQrcode = QrcodeModel::where('id', $qrcode->id)
        ->update(['qrcode_path' => $input['qrcode_path']]);


        $getQrcode = QrcodeModel::where('id', $qrcode->id)->first(); 
        if($request->expectsJson()) {
            //return new QrcodeResourceCollection($getQrcode);
            return response([
                'data'=> new QrcodeResource($getQrcode)
            ], Response::HTTP_ACCEPTED);
        }


        Flash::success('Qrcode updated successfully.');

        return redirect(route('qrcodes.index'));
    }

    /**
     * Remove the specified Qrcode from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $this->qrcodeRepository->delete($id);

        if($request->expectsJson()) {
            return response([
                'message'=> 'Qrcode deleted successfully'
            ], Response::HTTP_NOT_FOUND);
        }


        Flash::success('Qrcode deleted successfully.');

        return redirect(route('qrcodes.index'));
    }
}
