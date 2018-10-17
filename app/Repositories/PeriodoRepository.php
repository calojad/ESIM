<?php

namespace App\Repositories;

use App\Models\Periodo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeriodoRepository
 * @package App\Repositories
 * @version October 16, 2018, 10:05 am -05
 *
 * @method Periodo findWithoutFail($id, $columns = ['*'])
 * @method Periodo find($id, $columns = ['*'])
 * @method Periodo first($columns = ['*'])
*/
class PeriodoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_periodo_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Periodo::class;
    }
}
