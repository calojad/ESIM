<?php

namespace App\Repositories;

use App\Models\TipoMatriz;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoMatrizRepository
 * @package App\Repositories
 * @version March 7, 2019, 11:40 am -05
 *
 * @method TipoMatriz findWithoutFail($id, $columns = ['*'])
 * @method TipoMatriz find($id, $columns = ['*'])
 * @method TipoMatriz first($columns = ['*'])
*/
class TipoMatrizRepository extends BaseRepository
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
        return TipoMatriz::class;
    }
}
