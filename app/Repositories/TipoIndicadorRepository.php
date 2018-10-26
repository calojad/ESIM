<?php

namespace App\Repositories;

use App\Models\TipoIndicador;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoIndicadorRepository
 * @package App\Repositories
 * @version October 26, 2018, 3:03 pm -05
 *
 * @method TipoIndicador findWithoutFail($id, $columns = ['*'])
 * @method TipoIndicador find($id, $columns = ['*'])
 * @method TipoIndicador first($columns = ['*'])
*/
class TipoIndicadorRepository extends BaseRepository
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
        return TipoIndicador::class;
    }
}
