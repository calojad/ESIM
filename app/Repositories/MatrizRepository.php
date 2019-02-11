<?php

namespace App\Repositories;

use App\Models\Matriz;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MatrizRepository
 * @package App\Repositories
 * @version February 11, 2019, 10:22 am -05
 *
 * @method Matriz findWithoutFail($id, $columns = ['*'])
 * @method Matriz find($id, $columns = ['*'])
 * @method Matriz first($columns = ['*'])
*/
class MatrizRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'modelo_id',
        'periodo_id',
        'carrera_id',
        'departamento_id',
        'tipo_evaluacion_id',
        'nombre',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Matriz::class;
    }
}
