<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrimvideoRequest;
use App\Http\Requests\UpdatePrimvideoRequest;
use App\Repositories\PrimvideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PrimvideoController extends AppBaseController
{
    /** @var PrimvideoRepository $primvideoRepository*/
    private $primvideoRepository;

    public function __construct(PrimvideoRepository $primvideoRepo)
    {
        $this->primvideoRepository = $primvideoRepo;
    }

    /**
     * Display a listing of the Primvideo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $primvideos = $this->primvideoRepository->all();

        return view('primvideos.index')
            ->with('primvideos', $primvideos);
    }

    /**
     * Show the form for creating a new Primvideo.
     *
     * @return Response
     */
    public function create()
    {
        return view('primvideos.create');
    }

    /**
     * Store a newly created Primvideo in storage.
     *
     * @param CreatePrimvideoRequest $request
     *
     * @return Response
     */
    public function store(CreatePrimvideoRequest $request)
    {

        $input = $request->all();

        $Validation = $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            
        ]);


        if ($request->hasFile('video')){

            $file = $Validation['video'];
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'Infras-' . time() . '.' . $file->getClientOriginalExtension();
            // save to storage/app/infrastructure as the new $filename
            $path = $request->file('video')->storeAs('primvideo', $filename);

        }

            $input['video'] = $path;
            
            $primvideo = $this->primvideoRepository->create($input);    
            Flash::success('Primvideo saved successfully.');

            return redirect(route('primvideos.index'));

        } 
    //     $input = $request->all();

    //     $primvideo = $this->primvideoRepository->create($input);

    //     Flash::success('Primvideo saved successfully.');

    //     return redirect(route('primvideos.index'));
    // }

    /**
     * Display the specified Primvideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
       

        $primvideo = $this->primvideoRepository->find($id);

        if (empty($primvideo)) {
            Flash::error('Primvideo not found');

            return redirect(route('primvideos.index'));
        }

        return view('primvideos.show')->with('primvideo', $primvideo);
    }

    /**
     * Show the form for editing the specified Primvideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $primvideo = $this->primvideoRepository->find($id);

        if (empty($primvideo)) {
            Flash::error('Primvideo not found');

            return redirect(route('primvideos.index'));
        }

        return view('primvideos.edit')->with('primvideo', $primvideo);
    }

    /**
     * Update the specified Primvideo in storage.
     *
     * @param int $id
     * @param UpdatePrimvideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrimvideoRequest $request)
    {
        $primvideo = $this->primvideoRepository->find($id);

        if (empty($primvideo)) {
            Flash::error('Primvideo not found');

            return redirect(route('primvideos.index'));
        }

        $primvideo = $this->primvideoRepository->update($request->all(), $id);

        Flash::success('Primvideo updated successfully.');

        return redirect(route('primvideos.index'));
    }

    /**
     * Remove the specified Primvideo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $primvideo = $this->primvideoRepository->find($id);

        if (empty($primvideo)) {
            Flash::error('Primvideo not found');

            return redirect(route('primvideos.index'));
        }

        $this->primvideoRepository->delete($id);

        Flash::success('Primvideo deleted successfully.');

        return redirect(route('primvideos.index'));
    }
}
