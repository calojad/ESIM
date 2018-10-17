<?php

namespace App\Repositories;

use App\Models\TipoPeriodo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoPeriodoRepository
 * @package App\Repositories
 * @version October 16, 2018, 9:55 am -05
 *
 * @method TipoPeriodo findWithoutFail($id, $columns = ['*'])
 * @method TipoPeriodo find($id, $columns = ['*'])
 * @method TipoPeriodo first($columns = ['*'])
*/
class TipoPeriodoRepository extends BaseRepository
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
        return TipoPeriodo::class;
    }
}
