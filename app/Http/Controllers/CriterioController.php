<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCriterioRequest;
use App\Http\Requests\UpdateCriterioRequest;
use App\Repositories\CriterioRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

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
        return view('criterios.create');
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
        request()->validate([
            'nombre' => 'required|string|unique:criterio,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
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
        request()->validate([
            'nombre' => 'required|string|unique:criterio,nombre,'.$id,
            'estado' => 'required'
        ]);
        $criterio = $this->criterioRepository->findWithoutFail($id);

        if (empty($criterio)) {
            Flash::error('Criterio not found');

            return redirect(route('criterios.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $criterio = $this->criterioRepository->update($input->all(), $id);

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
