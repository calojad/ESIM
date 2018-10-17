<?php

namespace App\Repositories;

use App\Models\TipoUnidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoUnidadRepository
 * @package App\Repositories
 * @version October 16, 2018, 8:36 am -05
 *
 * @method TipoUnidad findWithoutFail($id, $columns = ['*'])
 * @method TipoUnidad find($id, $columns = ['*'])
 * @method TipoUnidad first($columns = ['*'])
*/
class TipoUnidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoUnidad::class;
    }
}
