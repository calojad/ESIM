<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCriterioRequest;
use App\Http\Requests\UpdateCriterioRequest;
use App\Models\Criterio;
use App\Repositories\CriterioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CriterioController extends AppBaseController
{
    /** @var  CriterioRepository */
    private $criterioRepository;

    public function __construct(CriterioRepository $criterioRepo)
    {
        $this->criterioRepository = $criterioRepo;
    }

    /**
     * Display a listing of the Criterio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->criterioRepository->pushCriteria(new RequestCriteria($request));
        $criterios = $this->criterioRepository->all();

        return view('criterios.index')
            ->with('criterios', $criterios);
    }

    /**
     * Show the form for creating a new Criterio.
     *
     * @return Response
     */
    public function create()
    {
        $criterios = Criterio::where('estado',1)->orderBy('nivel','asc')->pluck('nombre','id');
        return view('criterios.create',compact('criterios'));
    }

    /**
     * Store a newly created Criterio in storage.
     *
     * @param CreateCriterioRequest $request
     *
     * @return Response
     */
    public function store(CreateCriterioRequest $request)
    {
        $input = $request->all();
        $criterio = $this->criterioRepository->create($input);
        Flash::success('Criterio saved successfully.');
        return redirect(route('criterios.index'));
    }

    /**
     * Display the specified Criterio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $criterio = $this->criterioRepository->findWithoutFail($id);

        if (empty($criterio)) {
            Flash::error('Criterio not found');

            return redirect(route('criterios.index'));
        }

        return view('criterios.show')->with('criterio', $criterio);
    }

    /**
     * Show the form for editing the specified Criterio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $criterio = $this->criterioRepository->findWithoutFail($id);

        if (empty($criterio)) {
            Flash::error('Criterio not found');

            return redirect(route('criterios.index'));
        }

        return view('criterios.edit')->with('criterio', $criterio);
    }

    /**
     * Update the specified Criterio in storage.
     *
     * @param  int              $id
     * @param UpdateCriterioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCriterioRequest $request)
    {
        $criterio = $this->criterioRepository->findWithoutFail($id);

        if (empty($criterio)) {
            Flash::error('Criterio not found');

            return redirect(route('criterios.index'));
        }

        $criterio = $this->criterioRepository->update($request->all(), $id);

        Flash::success('Criterio updated successfully.');

        return redirect(route('criterios.index'));
    }

    /**
     * Remove the specified Criterio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $criterio = $this->criterioRepository->findWithoutFail($id);

        if (empty($criterio)) {
            Flash::error('Criterio not found');

            return redirect(route('criterios.index'));
        }

        $this->criterioRepository->delete($id);

        Flash::success('Criterio deleted successfully.');

        return redirect(route('criterios.index'));
    }
}
