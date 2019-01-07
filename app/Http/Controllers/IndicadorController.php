<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndicadorRequest;
use App\Http\Requests\UpdateIndicadorRequest;
use App\Repositories\IndicadorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IndicadorController extends AppBaseController
{
    /** @var  IndicadorRepository */
    private $indicadorRepository;

    public function __construct(IndicadorRepository $indicadorRepo)
    {
        $this->indicadorRepository = $indicadorRepo;
    }

    /**
     * Display a listing of the Indicador.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->indicadorRepository->pushCriteria(new RequestCriteria($request));
        $indicadors = $this->indicadorRepository->all();

        return view('indicadors.index')
            ->with('indicadors', $indicadors);
    }

    /**
     * Show the form for creating a new Indicador.
     *
     * @return Response
     */
    public function create()
    {
        return view('indicadors.create');
    }

    /**
     * Store a newly created Indicador in storage.
     *
     * @param CreateIndicadorRequest $request
     *
     * @return Response
     */
    public function store(CreateIndicadorRequest $request)
    {
        $input = $request->all();

        $indicador = $this->indicadorRepository->create($input);

        Flash::success('Indicador saved successfully.');

        return redirect(route('indicadors.index'));
    }

    /**
     * Display the specified Indicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        return view('indicadors.show')->with('indicador', $indicador);
    }

    /**
     * Show the form for editing the specified Indicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        return view('indicadors.edit')->with('indicador', $indicador);
    }

    /**
     * Update the specified Indicador in storage.
     *
     * @param  int              $id
     * @param UpdateIndicadorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndicadorRequest $request)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $indicador = $this->indicadorRepository->update($request->all(), $id);

        Flash::success('Indicador updated successfully.');

        return redirect(route('indicadors.index'));
    }

    /**
     * Remove the specified Indicador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $this->indicadorRepository->delete($id);

        Flash::success('Indicador deleted successfully.');

        return redirect(route('indicadors.index'));
    }
}
