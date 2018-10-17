<?php

namespace App\Repositories;

use App\Models\Carrera;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CarreraRepository
 * @package App\Repositories
 * @version October 16, 2018, 4:31 pm -05
 *
 * @method Carrera findWithoutFail($id, $columns = ['*'])
 * @method Carrera find($id, $columns = ['*'])
 * @method Carrera first($columns = ['*'])
*/
class CarreraRepository extends BaseRepository
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
        return Carrera::class;
    }
}
