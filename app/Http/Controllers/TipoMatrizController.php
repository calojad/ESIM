<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoMatrizRequest;
use App\Http\Requests\UpdateTipoMatrizRequest;
use App\Repositories\TipoMatrizRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoMatrizController extends AppBaseController
{
    /** @var  TipoMatrizRepository */
    private $tipoMatrizRepository;

    public function __construct(TipoMatrizRepository $tipoMatrizRepo)
    {
        $this->tipoMatrizRepository = $tipoMatrizRepo;
    }

    /**
     * Display a listing of the TipoMatriz.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoMatrizRepository->pushCriteria(new RequestCriteria($request));
        $tipoMatrizs = $this->tipoMatrizRepository->all();

        return view('tipo_matrizs.index')
            ->with('tipoMatrizs', $tipoMatrizs);
    }

    /**
     * Show the form for creating a new TipoMatriz.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_matrizs.create');
    }

    /**
     * Store a newly created TipoMatriz in storage.
     *
     * @param CreateTipoMatrizRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoMatrizRequest $request)
    {
        $input = $request->all();

        $tipoMatriz = $this->tipoMatrizRepository->create($input);

        Flash::success('Tipo Matriz saved successfully.');

        return redirect(route('tipoMatrizs.index'));
    }

    /**
     * Display the specified TipoMatriz.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoMatriz = $this->tipoMatrizRepository->findWithoutFail($id);

        if (empty($tipoMatriz)) {
            Flash::error('Tipo Matriz not found');

            return redirect(route('tipoMatrizs.index'));
        }

        return view('tipo_matrizs.show')->with('tipoMatriz', $tipoMatriz);
    }

    /**
     * Show the form for editing the specified TipoMatriz.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoMatriz = $this->tipoMatrizRepository->findWithoutFail($id);

        if (empty($tipoMatriz)) {
            Flash::error('Tipo Matriz not found');

            return redirect(route('tipoMatrizs.index'));
        }

        return view('tipo_matrizs.edit')->with('tipoMatriz', $tipoMatriz);
    }

    /**
     * Update the specified TipoMatriz in storage.
     *
     * @param  int              $id
     * @param UpdateTipoMatrizRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoMatrizRequest $request)
    {
        $tipoMatriz = $this->tipoMatrizRepository->findWithoutFail($id);

        if (empty($tipoMatriz)) {
            Flash::error('Tipo Matriz not found');

            return redirect(route('tipoMatrizs.index'));
        }

        $tipoMatriz = $this->tipoMatrizRepository->update($request->all(), $id);

        Flash::success('Tipo Matriz updated successfully.');

        return redirect(route('tipoMatrizs.index'));
    }

    /**
     * Remove the specified TipoMatriz from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoMatriz = $this->tipoMatrizRepository->findWithoutFail($id);

        if (empty($tipoMatriz)) {
            Flash::error('Tipo Matriz not found');

            return redirect(route('tipoMatrizs.index'));
        }

        $this->tipoMatrizRepository->delete($id);

        Flash::success('Tipo Matriz deleted successfully.');

        return redirect(route('tipoMatrizs.index'));
    }
}
