<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVariablesRequest;
use App\Http\Requests\UpdateVariablesRequest;
use App\Repositories\VariablesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VariablesController extends AppBaseController
{
    /** @var  VariablesRepository */
    private $variablesRepository;

    public function __construct(VariablesRepository $variablesRepo)
    {
        $this->variablesRepository = $variablesRepo;
    }

    /**
     * Display a listing of the Variables.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->variablesRepository->pushCriteria(new RequestCriteria($request));
        $variables = $this->variablesRepository->all();

        return view('variables.index')
            ->with('variables', $variables);
    }

    /**
     * Show the form for creating a new Variables.
     *
     * @return Response
     */
    public function create()
    {
        return view('variables.create');
    }

    /**
     * Store a newly created Variables in storage.
     *
     * @param CreateVariablesRequest $request
     *
     * @return Response
     */
    public function store(CreateVariablesRequest $request)
    {
        $input = $request->all();

        $variables = $this->variablesRepository->create($input);

        Flash::success('Variables saved successfully.');

        return redirect(route('variables.index'));
    }

    /**
     * Display the specified Variables.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $variables = $this->variablesRepository->findWithoutFail($id);

        if (empty($variables)) {
            Flash::error('Variables not found');

            return redirect(route('variables.index'));
        }

        return view('variables.show')->with('variables', $variables);
    }

    /**
     * Show the form for editing the specified Variables.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $variables = $this->variablesRepository->findWithoutFail($id);

        if (empty($variables)) {
            Flash::error('Variables not found');

            return redirect(route('variables.index'));
        }

        return view('variables.edit')->with('variables', $variables);
    }

    /**
     * Update the specified Variables in storage.
     *
     * @param  int              $id
     * @param UpdateVariablesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVariablesRequest $request)
    {
        $variables = $this->variablesRepository->findWithoutFail($id);

        if (empty($variables)) {
            Flash::error('Variables not found');

            return redirect(route('variables.index'));
        }

        $variables = $this->variablesRepository->update($request->all(), $id);

        Flash::success('Variables updated successfully.');

        return redirect(route('variables.index'));
    }

    /**
     * Remove the specified Variables from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $variables = $this->variablesRepository->findWithoutFail($id);

        if (empty($variables)) {
            Flash::error('Variables not found');

            return redirect(route('variables.index'));
        }

        $this->variablesRepository->delete($id);

        Flash::success('Variables deleted successfully.');

        return redirect(route('variables.index'));
    }
}
