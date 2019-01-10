<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateElementoRequest;
use App\Http\Requests\UpdateElementoRequest;
use App\Repositories\ElementoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ElementoController extends AppBaseController
{
    /** @var  ElementoRepository */
    private $elementoRepository;

    public function __construct(ElementoRepository $elementoRepo)
    {
        $this->elementoRepository = $elementoRepo;
    }

    /**
     * Display a listing of the Elemento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->elementoRepository->pushCriteria(new RequestCriteria($request));
        $elementos = $this->elementoRepository->all();

        return view('elementos.index')
            ->with('elementos', $elementos);
    }

    /**
     * Show the form for creating a new Elemento.
     *
     * @return Response
     */
    public function create()
    {
        return view('elementos.create');
    }

    /**
     * Store a newly created Elemento in storage.
     *
     * @param CreateElementoRequest $request
     *
     * @return Response
     */
    public function store(CreateElementoRequest $request)
    {
        $input = $request->all();
        $elemento = $this->elementoRepository->create($input);

        Flash::success('Elemento saved successfully.');

        return redirect(route('elementos.index'));
    }

    /**
     * Display the specified Elemento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $elemento = $this->elementoRepository->findWithoutFail($id);

        if (empty($elemento)) {
            Flash::error('Elemento not found');

            return redirect(route('elementos.index'));
        }

        return view('elementos.show')->with('elemento', $elemento);
    }

    /**
     * Show the form for editing the specified Elemento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $elemento = $this->elementoRepository->findWithoutFail($id);

        if (empty($elemento)) {
            Flash::error('Elemento not found');

            return redirect(route('elementos.index'));
        }

        return view('elementos.edit')->with('elemento', $elemento);
    }

    /**
     * Update the specified Elemento in storage.
     *
     * @param  int              $id
     * @param UpdateElementoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElementoRequest $request)
    {
        $elemento = $this->elementoRepository->findWithoutFail($id);

        if (empty($elemento)) {
            Flash::error('Elemento not found');

            return redirect(route('elementos.index'));
        }

        $elemento = $this->elementoRepository->update($request->all(), $id);

        Flash::success('Elemento updated successfully.');

        return redirect(route('elementos.index'));
    }

    /**
     * Remove the specified Elemento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $elemento = $this->elementoRepository->findWithoutFail($id);

        if (empty($elemento)) {
            Flash::error('Elemento not found');

            return redirect(route('elementos.index'));
        }

        $this->elementoRepository->delete($id);

        Flash::success('Elemento deleted successfully.');

        return redirect(route('elementos.index'));
    }
}
