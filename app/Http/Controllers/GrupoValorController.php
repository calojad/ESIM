<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrupoValorRequest;
use App\Http\Requests\UpdateGrupoValorRequest;
use App\Models\TipoIndicador;
use App\Models\Valoracion;
use App\Repositories\GrupoValorRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class GrupoValorController extends AppBaseController
{
    /** @var  GrupoValorRepository */
    private $grupoValorRepository;

    public function __construct(GrupoValorRepository $grupoValorRepo)
    {
        $this->grupoValorRepository = $grupoValorRepo;
    }

    /**
     * Display a listing of the GrupoValor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grupoValorRepository->pushCriteria(new RequestCriteria($request));
        $grupoValors = $this->grupoValorRepository->all();

        return view('grupo_valors.index')
            ->with('grupoValors', $grupoValors);
    }

    /**
     * Show the form for creating a new GrupoValor.
     *
     * @return Response
     */
    public function create()
    {
        $grupoValor = null;
        $tipoIndicadores = [0=>'--Seleccione--']+TipoIndicador::where('estado',1)
                ->pluck('nombre','id')
                ->toArray();
        return view('grupo_valors.create', compact('grupoValor','tipoIndicadores'));
    }

    /**
     * Store a newly created GrupoValor in storage.
     *
     * @param CreateGrupoValorRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupoValorRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:grupo_valor,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
        $grupoValor = $this->grupoValorRepository->create($input);

        Flash::success('Grupo Valor saved successfully.');

        return redirect(route('grupoValors.index'));
    }

    /**
     * Display the specified GrupoValor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grupoValor = $this->grupoValorRepository->findWithoutFail($id);
        if ($grupoValor === null) {
            Flash::error('Grupo Valor not found');
            return redirect(route('grupoValors.index'));
        }
        $valoracions = Valoracion::where('grupo_valor_id',$id)->get();

        return view('grupo_valors.show', compact('grupoValor','valoracions'));
    }

    /**
     * Show the form for editing the specified GrupoValor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grupoValor = $this->grupoValorRepository->findWithoutFail($id);
        if (empty($grupoValor)) {
            Flash::error('Grupo Valor not found');

            return redirect(route('grupoValors.index'));
        }
        $tipoIndicadores = [0=>'--Seleccione--']+TipoIndicador::where('estado',1)
                ->pluck('nombre','id')
                ->toArray();

        return view('grupo_valors.edit',compact('grupoValor','tipoIndicadores'));
    }

    /**
     * Update the specified GrupoValor in storage.
     *
     * @param  int              $id
     * @param UpdateGrupoValorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupoValorRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:grupo_valor,nombre,'.$id,
            'estado' => 'required'
        ]);
        $grupoValor = $this->grupoValorRepository->findWithoutFail($id);

        if (empty($grupoValor)) {
            Flash::error('Grupo Valor not found');

            return redirect(route('grupoValors.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $grupoValor = $this->grupoValorRepository->update($input, $id);

        Flash::success('Grupo Valor updated successfully.');

        return redirect(route('grupoValors.index'));
    }

    /**
     * Remove the specified GrupoValor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grupoValor = $this->grupoValorRepository->findWithoutFail($id);

        if (empty($grupoValor)) {
            Flash::error('Grupo Valor not found');

            return redirect(route('grupoValors.index'));
        }

        $this->grupoValorRepository->delete($id);

        Flash::success('Grupo Valor deleted successfully.');

        return redirect(route('grupoValors.index'));
    }
}
