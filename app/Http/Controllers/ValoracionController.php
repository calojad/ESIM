<?php

namespace App\Http\Controllers;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateValoracionRequest;
use App\Http\Requests\UpdateValoracionRequest;
use App\Repositories\ValoracionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\GrupoValor;
use Flash;
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
        $grupoValor = GrupoValor::find($id);
        $valoracion = null;
        $colorsClass = ['bg-green' => 'Verde','bg-aqua' => 'Aqua','bg-yellow' => 'Amarillo','bg-red' => 'Rojo','bg-gray' => 'Gris','bg-teal' => 'Teal','bg-purple' => 'Purpura','bg-orange' => 'Naranja','bg-maroon' => 'Marron'];
        return view('valoracions.create',compact('grupoValor','colorsClass','valoracion'));
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
        $grupoValor = GrupoValor::find($valoracion->grupo_valor_id);
        $colorsClass = ['bg-green' => 'Verde','bg-aqua' => 'Aqua','bg-yellow' => 'Amarillo','bg-red' => 'Rojo','bg-gray' => 'Gris','bg-teal' => 'Teal','bg-purple' => 'Purpura','bg-orange' => 'Naranja','bg-maroon' => 'Marron'];

        return view('valoracions.edit',compact('valoracion','grupoValor','colorsClass'));
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
