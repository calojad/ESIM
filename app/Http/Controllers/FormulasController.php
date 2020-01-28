<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormulasRequest;
use App\Http\Requests\UpdateFormulasRequest;
use App\Repositories\FormulasRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class FormulasController extends AppBaseController
{
    /** @var  FormulasRepository */
    private $formulasRepository;

    public function __construct(FormulasRepository $formulasRepo)
    {
        $this->formulasRepository = $formulasRepo;
    }

    /**
     * Display a listing of the Formulas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formulasRepository->pushCriteria(new RequestCriteria($request));
        $formulas = $this->formulasRepository->all();

        return view('formulas.index')
            ->with('formulas', $formulas);
    }

    /**
     * Show the form for creating a new Formulas.
     *
     * @return Response
     */
    public function create()
    {
        $formulas=null;
        return view('formulas.create')->with('formulas',$formulas);
    }

    /**
     * Store a newly created Formulas in storage.
     *
     * @param CreateFormulasRequest $request
     *
     * @return Response
     */
    public function store(CreateFormulasRequest $request)
    {
        $input = $request->all();
        HelperCal::strUp($input);
        $formulas = $this->formulasRepository->create($input);
        Flash::success('Formulas saved successfully.');

        return redirect(route('formulaVariables.formulasVariablesagregar',$formulas->id));
    }

    /**
     * Display the specified Formulas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formulas = $this->formulasRepository->findWithoutFail($id);
        if (empty($formulas)) {
            Flash::error('Formulas not found');
            return redirect(route('formulas.index'));
        }

        return view('formulas.show')->with('formulas', $formulas);
    }

    /**
     * Show the form for editing the specified Formulas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formulas = $this->formulasRepository->findWithoutFail($id);
        if (empty($formulas)) {
            Flash::error('Formulas not found');
            return redirect(route('formulas.index'));
        }

        return view('formulas.edit')->with('formulas', $formulas);
    }

    /**
     * Update the specified Formulas in storage.
     *
     * @param  int              $id
     * @param UpdateFormulasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormulasRequest $request)
    {
        $formulas = $this->formulasRepository->findWithoutFail($id);
        if (empty($formulas)) {
            Flash::error('Formulas not found');
            return redirect('cuantitativos/F');
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $formulas = $this->formulasRepository->update($input, $id);
        Flash::success('Formulas updated successfully.');

        return redirect('cuantitativos/F');
    }

    /**
     * Remove the specified Formulas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formulas = $this->formulasRepository->findWithoutFail($id);
        if (empty($formulas)) {
            Flash::error('Formulas not found');
            return redirect('cuantitativos/F');
        }
        $this->formulasRepository->delete($id);
        Flash::success('Formulas deleted successfully.');

        return redirect('cuantitativos/F');
    }
}