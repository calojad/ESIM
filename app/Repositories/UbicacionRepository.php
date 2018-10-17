<?php

namespace App\Repositories;

use App\Models\Ubicacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UbicacionRepository
 * @package App\Repositories
 * @version October 15, 2018, 4:31 pm -05
 *
 * @method Ubicacion findWithoutFail($id, $columns = ['*'])
 * @method Ubicacion find($id, $columns = ['*'])
 * @method Ubicacion first($columns = ['*'])
*/
class UbicacionRepository extends BaseRepository
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
        return Ubicacion::class;
    }
}
