<?php

namespace App\Repositories;

use App\Models\Valoracion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ValoracionRepository
 * @package App\Repositories
 * @version October 28, 2018, 3:57 pm -05
 *
 * @method Valoracion findWithoutFail($id, $columns = ['*'])
 * @method Valoracion find($id, $columns = ['*'])
 * @method Valoracion first($columns = ['*'])
*/
class ValoracionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'grupo_valor_id',
        'nombre',
        'abreviatura',
        'valor',
        'rango_inicio',
        'rango_fin',
        'color',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Valoracion::class;
    }
}
