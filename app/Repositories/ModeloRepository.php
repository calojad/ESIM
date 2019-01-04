<?php

namespace App\Repositories;

use App\Models\Modelo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModeloRepository
 * @package App\Repositories
 * @version January 4, 2019, 2:34 pm -05
 *
 * @method Modelo findWithoutFail($id, $columns = ['*'])
 * @method Modelo find($id, $columns = ['*'])
 * @method Modelo first($columns = ['*'])
*/
class ModeloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'abreviado',
        'descripcion',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Modelo::class;
    }
}
