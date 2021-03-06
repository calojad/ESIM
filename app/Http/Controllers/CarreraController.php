<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Models\Responsable;
use App\Repositories\CarreraRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class CarreraController extends AppBaseController
{
    /** @var  CarreraRepository */
    private $carreraRepository;

    public function __construct(CarreraRepository $carreraRepo)
    {
        $this->carreraRepository = $carreraRepo;
    }

    /**
     * Display a listing of the Carrera.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->carreraRepository->pushCriteria(new RequestCriteria($request));
        $carreras = $this->carreraRepository->all();
        $tipo = ['D'=>'Diseñada','A'=>'Anterior','R'=>'Rediseñada','P'=>'Plan de Cierre'];
        return view('carreras.index',compact('carreras','tipo'));
    }

    /**
     * Show the form for creating a new Carrera.
     *
     * @return Response
     */
    public function create()
    {
        $responsables = Responsable::where('estado',1)->pluck('nombre','id');
        return view('carreras.create', compact('responsables'));
    }

    /**
     * Store a newly created Carrera in storage.
     *
     * @param CreateCarreraRequest $request
     *
     * @return Response
     */
    public function store(CreateCarreraRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:carrera,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
        $carrera = $this->carreraRepository->create($input);
        Flash::success('Carrera saved successfully.');
        return redirect(route('carreras.index'));
    }

    /**
     * Display the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');
            return redirect(route('carreras.index'));
        }

        return view('carreras.show')->with('carrera', $carrera);
    }

    /**
     * Show the form for editing the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');
            return redirect(route('carreras.index'));
        }
        $responsables = Responsable::where('estado',1)->pluck('nombre','id');
        return view('carreras.edit',compact('carrera','responsables'));
    }

    /**
     * Update the specified Carrera in storage.
     *
     * @param  int              $id
     * @param UpdateCarreraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarreraRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:carrera,nombre,'.$id,
            'estado' => 'required'
        ]);
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');
            return redirect(route('carreras.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $carrera = $this->carreraRepository->update($input, $id);
        Flash::success('Carrera updated successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Remove the specified Carrera from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');
            return redirect(route('carreras.index'));
        }

        $this->carreraRepository->delete($id);
        Flash::success('Carrera deleted successfully.');

        return redirect(route('carreras.index'));
    }
}
