<?php

namespace App\Repositories;

use App\Models\Evidencia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EvidenciaRepository
 * @package App\Repositories
 * @version January 10, 2019, 10:10 am -05
 *
 * @method Evidencia findWithoutFail($id, $columns = ['*'])
 * @method Evidencia find($id, $columns = ['*'])
 * @method Evidencia first($columns = ['*'])
*/
class EvidenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'importancia',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Evidencia::class;
    }
}
