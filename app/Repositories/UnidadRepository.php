<?php

namespace App\Repositories;

use App\Models\Unidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UnidadRepository
 * @package App\Repositories
 * @version October 16, 2018, 11:57 am -05
 *
 * @method Unidad findWithoutFail($id, $columns = ['*'])
 * @method Unidad find($id, $columns = ['*'])
 * @method Unidad first($columns = ['*'])
*/
class UnidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_unidad_id',
        'ubicacion_id',
        'nombre',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Unidad::class;
    }
}
