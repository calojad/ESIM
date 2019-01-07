<?php

namespace App\Repositories;

use App\Models\Criterio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CriterioRepository
 * @package App\Repositories
 * @version January 7, 2019, 2:23 pm -05
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
        'descripcion',
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
