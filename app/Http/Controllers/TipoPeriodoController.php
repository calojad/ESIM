<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoPeriodoRequest;
use App\Http\Requests\UpdateTipoPeriodoRequest;
use App\Repositories\TipoPeriodoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoPeriodoController extends AppBaseController
{
    /** @var  TipoPeriodoRepository */
    private $tipoPeriodoRepository;

    public function __construct(TipoPeriodoRepository $tipoPeriodoRepo)
    {
        $this->tipoPeriodoRepository = $tipoPeriodoRepo;
    }

    /**
     * Display a listing of the TipoPeriodo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoPeriodoRepository->pushCriteria(new RequestCriteria($request));
        $tipoPeriodos = $this->tipoPeriodoRepository->all();

        return view('tipo_periodos.index')
            ->with('tipoPeriodos', $tipoPeriodos);
    }

    /**
     * Show the form for creating a new TipoPeriodo.
     *
     * @return Response
     */
    public function create()
    {
        $tipoPeriodo = null;
        return view('tipo_periodos.create')->with('tipoPeriodo',$tipoPeriodo);
    }

    /**
     * Store a newly created TipoPeriodo in storage.
     *
     * @param CreateTipoPeriodoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoPeriodoRequest $request)
    {
        $input = $request->all();

        $tipoPeriodo = $this->tipoPeriodoRepository->create($input);

        Flash::success('Tipo Periodo saved successfully.');

        return redirect(route('tipoPeriodos.index'));
    }

    /**
     * Display the specified TipoPeriodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPeriodo = $this->tipoPeriodoRepository->findWithoutFail($id);

        if (empty($tipoPeriodo)) {
            Flash::error('Tipo Periodo not found');

            return redirect(route('tipoPeriodos.index'));
        }

        return view('tipo_periodos.show')->with('tipoPeriodo', $tipoPeriodo);
    }

    /**
     * Show the form for editing the specified TipoPeriodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPeriodo = $this->tipoPeriodoRepository->findWithoutFail($id);

        if (empty($tipoPeriodo)) {
            Flash::error('Tipo Periodo not found');

            return redirect(route('tipoPeriodos.index'));
        }

        return view('tipo_periodos.edit')->with('tipoPeriodo', $tipoPeriodo);
    }

    /**
     * Update the specified TipoPeriodo in storage.
     *
     * @param  int              $id
     * @param UpdateTipoPeriodoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoPeriodoRequest $request)
    {
        $tipoPeriodo = $this->tipoPeriodoRepository->findWithoutFail($id);

        if (empty($tipoPeriodo)) {
            Flash::error('Tipo Periodo not found');

            return redirect(route('tipoPeriodos.index'));
        }

        $tipoPeriodo = $this->tipoPeriodoRepository->update($request->all(), $id);

        Flash::success('Tipo Periodo updated successfully.');

        return redirect(route('tipoPeriodos.index'));
    }

    /**
     * Remove the specified TipoPeriodo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPeriodo = $this->tipoPeriodoRepository->findWithoutFail($id);

        if (empty($tipoPeriodo)) {
            Flash::error('Tipo Periodo not found');

            return redirect(route('tipoPeriodos.index'));
        }

        $this->tipoPeriodoRepository->delete($id);

        Flash::success('Tipo Periodo deleted successfully.');

        return redirect(route('tipoPeriodos.index'));
    }
}
