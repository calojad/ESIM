<?php

namespace App\Repositories;

use App\Models\Criterio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CriterioRepository
 * @package App\Repositories
 * @version January 5, 2019, 11:14 am -05
 *
 * @method Criterio findWithoutFail($id, $columns = ['*'])
 * @method Criterio find($id, $columns = ['*'])
 * @method Criterio first($columns = ['*'])
*/
class CriterioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'abreviado',
        'nivel',
        'descripcion',
        'criterio_padre_id',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Criterio::class;
    }
}
