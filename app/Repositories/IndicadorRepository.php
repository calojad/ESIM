<?php

namespace App\Repositories;

use App\Models\Indicador;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IndicadorRepository
 * @package App\Repositories
 * @version January 7, 2019, 5:48 pm -05
 *
 * @method Indicador findWithoutFail($id, $columns = ['*'])
 * @method Indicador find($id, $columns = ['*'])
 * @method Indicador first($columns = ['*'])
*/
class IndicadorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_indicador_id',
        'grupo_valor_id',
        'formula_id',
        'nombre',
        'descripcion',
        'estandar',
        'vigencia',
        'marco_normativo',
        'fuente_info',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Indicador::class;
    }
}
