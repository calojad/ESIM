<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Models\Responsable;
use App\Repositories\DepartamentoRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class DepartamentoController extends AppBaseController
{
    /** @var  DepartamentoRepository */
    private $departamentoRepository;

    public function __construct(DepartamentoRepository $departamentoRepo)
    {
        $this->departamentoRepository = $departamentoRepo;
    }

    /**
     * Display a listing of the Departamento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departamentoRepository->pushCriteria(new RequestCriteria($request));
        $departamentos = $this->departamentoRepository->all();

        return view('departamentos.index')
            ->with('departamentos', $departamentos);
    }

    /**
     * Show the form for creating a new Departamento.
     *
     * @return Response
     */
    public function create()
    {
        $responsables = Responsable::where('estado',1)->pluck('nombre','id')->toArray();
        return view('departamentos.create',compact('responsables'));
    }

    /**
     * Store a newly created Departamento in storage.
     *
     * @param CreateDepartamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentoRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:departamento,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
        $departamento = $this->departamentoRepository->create($input);

        Flash::success('Departamento saved successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamento', $departamento);
    }

    /**
     * Show the form for editing the specified Departamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        $responsables = Responsable::where('estado',1)->pluck('nombre','id')->toArray();
        return view('departamentos.edit',compact('departamento','responsables'));
    }

    /**
     * Update the specified Departamento in storage.
     *
     * @param  int              $id
     * @param UpdateDepartamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentoRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:departamento,nombre,'.$id,
            'estado' => 'required'
        ]);
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $departamento = $this->departamentoRepository->update($input, $id);

        Flash::success('Departamento updated successfully.');

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified Departamento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            Flash::error('Departamento not found');

            return redirect(route('departamentos.index'));
        }

        $this->departamentoRepository->delete($id);

        Flash::success('Departamento deleted successfully.');

        return redirect(route('departamentos.index'));
    }
}
