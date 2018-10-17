<?php

namespace App\Repositories;

use App\Models\TipoEvaluacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEvaluacionRepository
 * @package App\Repositories
 * @version October 16, 2018, 9:29 am -05
 *
 * @method TipoEvaluacion findWithoutFail($id, $columns = ['*'])
 * @method TipoEvaluacion find($id, $columns = ['*'])
 * @method TipoEvaluacion first($columns = ['*'])
*/
class TipoEvaluacionRepository extends BaseRepository
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
        return TipoEvaluacion::class;
    }
}
