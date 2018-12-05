<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormulaVariableRequest;
use App\Http\Requests\UpdateFormulaVariableRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FormulaVariableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Formulas;
use Response;
use Flash;

class FormulaVariableController extends AppBaseController
{
    /** @var  FormulaVariableRepository */
    private $formulaVariableRepository;

    public function __construct(FormulaVariableRepository $formulaVariableRepo)
    {
        $this->formulaVariableRepository = $formulaVariableRepo;
    }

    /**
     * Display a listing of the FormulaVariable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formulaVariableRepository->pushCriteria(new RequestCriteria($request));
        $formulaVariables = $this->formulaVariableRepository->all();

        return view('formula_variables.index')
            ->with('formulaVariables', $formulaVariables);
    }

    /**
     * Show the form for creating a new FormulaVariable.
     *
     * @return Response
     */
    public function create()
    {
        $formula = Formula::find($id);
        return view('formula_variables.create',compact('formula'));
    }

    /**
     * Store a newly created FormulaVariable in storage.
     *
     * @param CreateFormulaVariableRequest $request
     *
     * @return Response
     */
    public function store(CreateFormulaVariableRequest $request)
    {
        $input = $request->all();

        $formulaVariable = $this->formulaVariableRepository->create($input);

        Flash::success('Formula Variable saved successfully.');

        return redirect(route('formulaVariables.index'));
    }

    /**
     * Display the specified FormulaVariable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formula = Formulas::find($id);

        if (empty($formula)) {
            Flash::error('Formula Variable not found');

            return redirect('cuantitativos/F');
        }

         return view('formula_variables.create',compact('formula'));
    }

    /**
     * Show the form for editing the specified FormulaVariable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formulaVariable = $this->formulaVariableRepository->findWithoutFail($id);

        if (empty($formulaVariable)) {
            Flash::error('Formula Variable not found');

            return redirect(route('formulaVariables.index'));
        }

        return view('formula_variables.edit')->with('formulaVariable', $formulaVariable);
    }

    /**
     * Update the specified FormulaVariable in storage.
     *
     * @param  int              $id
     * @param UpdateFormulaVariableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormulaVariableRequest $request)
    {
        $formulaVariable = $this->formulaVariableRepository->findWithoutFail($id);

        if (empty($formulaVariable)) {
            Flash::error('Formula Variable not found');

            return redirect(route('formulaVariables.index'));
        }

        $formulaVariable = $this->formulaVariableRepository->update($request->all(), $id);

        Flash::success('Formula Variable updated successfully.');

        return redirect(route('formulaVariables.index'));
    }

    /**
     * Remove the specified FormulaVariable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formulaVariable = $this->formulaVariableRepository->findWithoutFail($id);

        if (empty($formulaVariable)) {
            Flash::error('Formula Variable not found');

            return redirect('cuantitativos/F');
        }

        $this->formulaVariableRepository->delete($id);

        Flash::success('Formula Variable deleted successfully.');

        return redirect('cuantitativos/F');
    }
}
