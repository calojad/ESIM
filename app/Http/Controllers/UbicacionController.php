<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUbicacionRequest;
use App\Http\Requests\UpdateUbicacionRequest;
use App\Repositories\UbicacionRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class UbicacionController extends AppBaseController
{
    /** @var  UbicacionRepository */
    private $ubicacionRepository;

    public function __construct(UbicacionRepository $ubicacionRepo)
    {
        $this->ubicacionRepository = $ubicacionRepo;
    }

    /**
     * Display a listing of the Ubicacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ubicacionRepository->pushCriteria(new RequestCriteria($request));
        $ubicacions = $this->ubicacionRepository->all();

        return view('ubicacions.index')
            ->with('ubicacions', $ubicacions);
    }

    /**
     * Show the form for creating a new Ubicacion.
     *
     * @return Response
     */
    public function create()
    {
        $ubicacion=null;
        return view('ubicacions.create')->with('ubicacion', $ubicacion);
    }

    /**
     * Store a newly created Ubicacion in storage.
     *
     * @param CreateUbicacionRequest $request
     *
     * @return Response
     */
    public function store(CreateUbicacionRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:ubicacion,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
        $ubicacion = $this->ubicacionRepository->create($input);

        Flash::success('Ubicacion saved successfully.');

        return redirect(route('ubicacions.index'));
    }

    /**
     * Display the specified Ubicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ubicacion = $this->ubicacionRepository->findWithoutFail($id);

        if (empty($ubicacion)) {
            Flash::error('Ubicacion not found');

            return redirect(route('ubicacions.index'));
        }

        return view('ubicacions.show')->with('ubicacion', $ubicacion);
    }

    /**
     * Show the form for editing the specified Ubicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ubicacion = $this->ubicacionRepository->findWithoutFail($id);

        if (empty($ubicacion)) {
            Flash::error('Ubicacion not found');

            return redirect(route('ubicacions.index'));
        }

        return view('ubicacions.edit')->with('ubicacion', $ubicacion);
    }

    /**
     * Update the specified Ubicacion in storage.
     *
     * @param  int              $id
     * @param UpdateUbicacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUbicacionRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:ubicacion,nombre,'.$id,
            'estado' => 'required'
        ]);
        $ubicacion = $this->ubicacionRepository->findWithoutFail($id);

        if (empty($ubicacion)) {
            Flash::error('Ubicacion not found');

            return redirect(route('ubicacions.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $ubicacion = $this->ubicacionRepository->update($input, $id);

        Flash::success('Ubicacion updated successfully.');

        return redirect(route('ubicacions.index'));
    }

    /**
     * Remove the specified Ubicacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ubicacion = $this->ubicacionRepository->findWithoutFail($id);

        if (empty($ubicacion)) {
            Flash::error('Ubicacion not found');

            return redirect(route('ubicacions.index'));
        }

        $this->ubicacionRepository->delete($id);

        Flash::success('Ubicacion deleted successfully.');

        return redirect(route('ubicacions.index'));
    }
}
