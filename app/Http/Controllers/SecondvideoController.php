<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSecondvideoRequest;
use App\Http\Requests\UpdateSecondvideoRequest;
use App\Repositories\SecondvideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SecondvideoController extends AppBaseController
{
    /** @var SecondvideoRepository $secondvideoRepository*/
    private $secondvideoRepository;

    public function __construct(SecondvideoRepository $secondvideoRepo)
    {
        $this->secondvideoRepository = $secondvideoRepo;
    }

    /**
     * Display a listing of the Secondvideo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $secondvideos = $this->secondvideoRepository->all();

        return view('secondvideos.index')
            ->with('secondvideos', $secondvideos);
    }

    /**
     * Show the form for creating a new Secondvideo.
     *
     * @return Response
     */
    public function create()
    {
        return view('secondvideos.create');
    }

    /**
     * Store a newly created Secondvideo in storage.
     *
     * @param CreateSecondvideoRequest $request
     *
     * @return Response
     */
    public function store(CreateSecondvideoRequest $request)
    {
        $input = $request->all();

        $Validation = $request->validate([
            'video' => 'required|file|mimetypes:video/mp4',
            
        ]);


        if ($request->hasFile('video')){

            $file = $Validation['video'];
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'Infras-' . time() . '.' . $file->getClientOriginalExtension();
            // save to storage/app/infrastructure as the new $filename
            $path = $request->file('video')->storeAs('primvideo', $filename);

        }

            $input['video'] = $path;
           

        $secondvideo = $this->secondvideoRepository->create($input);

        Flash::success('Secondvideo saved successfully.');

        return redirect(route('secondvideos.index'));
    }

    /**
     * Display the specified Secondvideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $secondvideo = $this->secondvideoRepository->find($id);

        if (empty($secondvideo)) {
            Flash::error('Secondvideo not found');

            return redirect(route('secondvideos.index'));
        }

        return view('secondvideos.show')->with('secondvideo', $secondvideo);
    }

    /**
     * Show the form for editing the specified Secondvideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $secondvideo = $this->secondvideoRepository->find($id);

        if (empty($secondvideo)) {
            Flash::error('Secondvideo not found');

            return redirect(route('secondvideos.index'));
        }

        return view('secondvideos.edit')->with('secondvideo', $secondvideo);
    }

    /**
     * Update the specified Secondvideo in storage.
     *
     * @param int $id
     * @param UpdateSecondvideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecondvideoRequest $request)
    {
        $secondvideo = $this->secondvideoRepository->find($id);

        if (empty($secondvideo)) {
            Flash::error('Secondvideo not found');

            return redirect(route('secondvideos.index'));
        }

        $secondvideo = $this->secondvideoRepository->update($request->all(), $id);

        Flash::success('Secondvideo updated successfully.');

        return redirect(route('secondvideos.index'));
    }

    /**
     * Remove the specified Secondvideo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $secondvideo = $this->secondvideoRepository->find($id);

        if (empty($secondvideo)) {
            Flash::error('Secondvideo not found');

            return redirect(route('secondvideos.index'));
        }

        $this->secondvideoRepository->delete($id);

        Flash::success('Secondvideo deleted successfully.');

        return redirect(route('secondvideos.index'));
    }
}
