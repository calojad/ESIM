<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponsableRequest;
use App\Http\Requests\UpdateResponsableRequest;
use App\Repositories\ResponsableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ResponsableController extends AppBaseController
{
    /** @var  ResponsableRepository */
    private $responsableRepository;

    public function __construct(ResponsableRepository $responsableRepo)
    {
        $this->responsableRepository = $responsableRepo;
    }

    /**
     * Display a listing of the Responsable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->responsableRepository->pushCriteria(new RequestCriteria($request));
        $responsables = $this->responsableRepository->all();

        return view('responsables.index')
            ->with('responsables', $responsables);
    }

    /**
     * Show the form for creating a new Responsable.
     *
     * @return Response
     */
    public function create()
    {
        return view('responsables.create');
    }

    /**
     * Store a newly created Responsable in storage.
     *
     * @param CreateResponsableRequest $request
     *
     * @return Response
     */
    public function store(CreateResponsableRequest $request)
    {
        $input = $request->all();

        $responsable = $this->responsableRepository->create($input);

        Flash::success('Responsable saved successfully.');

        return redirect(route('responsables.index'));
    }

    /**
     * Display the specified Responsable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $responsable = $this->responsableRepository->findWithoutFail($id);

        if (empty($responsable)) {
            Flash::error('Responsable not found');

            return redirect(route('responsables.index'));
        }

        return view('responsables.show')->with('responsable', $responsable);
    }

    /**
     * Show the form for editing the specified Responsable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $responsable = $this->responsableRepository->findWithoutFail($id);

        if (empty($responsable)) {
            Flash::error('Responsable not found');

            return redirect(route('responsables.index'));
        }

        return view('responsables.edit')->with('responsable', $responsable);
    }

    /**
     * Update the specified Responsable in storage.
     *
     * @param  int              $id
     * @param UpdateResponsableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponsableRequest $request)
    {
        $responsable = $this->responsableRepository->findWithoutFail($id);

        if (empty($responsable)) {
            Flash::error('Responsable not found');

            return redirect(route('responsables.index'));
        }

        $responsable = $this->responsableRepository->update($request->all(), $id);

        Flash::success('Responsable updated successfully.');

        return redirect(route('responsables.index'));
    }

    /**
     * Remove the specified Responsable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $responsable = $this->responsableRepository->findWithoutFail($id);

        if (empty($responsable)) {
            Flash::error('Responsable not found');

            return redirect(route('responsables.index'));
        }

        $this->responsableRepository->delete($id);

        Flash::success('Responsable deleted successfully.');

        return redirect(route('responsables.index'));
    }
}
