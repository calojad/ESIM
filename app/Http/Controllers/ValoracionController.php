<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValoracionRequest;
use App\Http\Requests\UpdateValoracionRequest;
use App\Repositories\ValoracionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ValoracionController extends AppBaseController
{
    /** @var  ValoracionRepository */
    private $valoracionRepository;

    public function __construct(ValoracionRepository $valoracionRepo)
    {
        $this->valoracionRepository = $valoracionRepo;
    }

    /**
     * Display a listing of the Valoracion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->valoracionRepository->pushCriteria(new RequestCriteria($request));
        $valoracions = $this->valoracionRepository->all();

        return view('valoracions.index')
            ->with('valoracions', $valoracions);
    }

    /**
     * Show the form for creating a new Valoracion.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('valoracions.create',compact('id'));
    }

    /**
     * Store a newly created Valoracion in storage.
     *
     * @param CreateValoracionRequest $request
     *
     * @return Response
     */
    public function store(CreateValoracionRequest $request)
    {
        $input = $request->all();
        $valoracion = $this->valoracionRepository->create($input);
        Flash::success('Valoracion saved successfully.');

        return redirect(route('grupoValors.show',$input['grupo_valor_id']));
    }

    /**
     * Display the specified Valoracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $valoracion = $this->valoracionRepository->findWithoutFail($id);

        if (empty($valoracion)) {
            Flash::error('Valoracion not found');

            return redirect(route('valoracions.index'));
        }

        return view('valoracions.show')->with('valoracion', $valoracion);
    }

    /**
     * Show the form for editing the specified Valoracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $valoracion = $this->valoracionRepository->findWithoutFail($id);

        if (empty($valoracion)) {
            Flash::error('Valoracion not found');

            return redirect(route('valoracions.index'));
        }

        return view('valoracions.edit')->with('valoracion', $valoracion);
    }

    /**
     * Update the specified Valoracion in storage.
     *
     * @param  int              $id
     * @param UpdateValoracionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateValoracionRequest $request)
    {
        $valoracion = $this->valoracionRepository->findWithoutFail($id);

        if (empty($valoracion)) {
            Flash::error('Valoracion not found');

            return redirect(route('valoracions.index'));
        }

        $valoracion = $this->valoracionRepository->update($request->all(), $id);

        Flash::success('Valoracion updated successfully.');

        return redirect(route('valoracions.index'));
    }

    /**
     * Remove the specified Valoracion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $valoracion = $this->valoracionRepository->findWithoutFail($id);

        if (empty($valoracion)) {
            Flash::error('Valoracion not found');

            return redirect(route('valoracions.index'));
        }

        $this->valoracionRepository->delete($id);

        Flash::success('Valoracion deleted successfully.');

        return redirect(route('valoracions.index'));
    }
}
