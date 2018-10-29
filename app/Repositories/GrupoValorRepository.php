<?php

namespace App\Repositories;

use App\Models\GrupoValor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GrupoValorRepository
 * @package App\Repositories
 * @version October 28, 2018, 1:09 pm -05
 *
 * @method GrupoValor findWithoutFail($id, $columns = ['*'])
 * @method GrupoValor find($id, $columns = ['*'])
 * @method GrupoValor first($columns = ['*'])
*/
class GrupoValorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_indicador_id',
        'nombre',
        'descripcion',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrupoValor::class;
    }
}
