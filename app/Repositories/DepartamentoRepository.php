<?php

namespace App\Repositories;

use App\Models\Departamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartamentoRepository
 * @package App\Repositories
 * @version February 11, 2019, 10:34 am -05
 *
 * @method Departamento findWithoutFail($id, $columns = ['*'])
 * @method Departamento find($id, $columns = ['*'])
 * @method Departamento first($columns = ['*'])
*/
class DepartamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'responsable_id',
        'nombre',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Departamento::class;
    }
}
