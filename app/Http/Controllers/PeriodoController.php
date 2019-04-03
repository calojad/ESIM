<?php

namespace App\Http\Controllers;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreatePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use App\Repositories\PeriodoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\TipoPeriodo;
use Illuminate\Http\Request;
use Flash;
use Response;

class PeriodoController extends AppBaseController
{
    /** @var  PeriodoRepository */
    private $periodoRepository;

    public function __construct(PeriodoRepository $periodoRepo)
    {
        $this->periodoRepository = $periodoRepo;
    }

    /**
     * Display a listing of the Periodo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodoRepository->pushCriteria(new RequestCriteria($request));
        $periodos = $this->periodoRepository->all();
        return view('periodos.index')->with('periodos', $periodos);
    }

    /**
     * Show the form for creating a new Periodo.
     *
     * @return Response
     */
    public function create()
    {
        $periodo = null;
        $tipoPeriodos = TipoPeriodo::all()->pluck('nombre','id') ;
        return view('periodos.create',compact('periodo','tipoPeriodos'));
    }

    /**
     * Store a newly created Periodo in storage.
     *
     * @param CreatePeriodoRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodoRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:periodo,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();

        $periodo = $this->periodoRepository->create($input);

        Flash::success('Periodo saved successfully.');

        return redirect(route('periodos.index'));
    }

    /**
     * Display the specified Periodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo not found');

            return redirect(route('periodos.index'));
        }

        return view('periodos.show')->with('periodo', $periodo);
    }

    /**
     * Show the form for editing the specified Periodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);
        $tipoPeriodos = TipoPeriodo::all()->pluck('nombre','id');

        if (empty($periodo)) {
            Flash::error('Periodo not found');

            return redirect(route('periodos.index'));
        }

        return view('periodos.edit',compact('periodo','tipoPeriodos'));
    }

    /**
     * Update the specified Periodo in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodoRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:periodo,nombre,'.$id,
            'estado' => 'required'
        ]);
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo not found');

            return redirect(route('periodos.index'));
        }

        $periodo = $this->periodoRepository->update($request->all(), $id);

        Flash::success('Periodo updated successfully.');

        return redirect(route('periodos.index'));
    }

    /**
     * Remove the specified Periodo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo not found');

            return redirect(route('periodos.index'));
        }

        $this->periodoRepository->delete($id);

        Flash::success('Periodo deleted successfully.');

        return redirect(route('periodos.index'));
    }
}
