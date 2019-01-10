<?php

namespace App\Repositories;

use App\Models\Elemento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ElementoRepository
 * @package App\Repositories
 * @version January 10, 2019, 11:34 am -05
 *
 * @method Elemento findWithoutFail($id, $columns = ['*'])
 * @method Elemento find($id, $columns = ['*'])
 * @method Elemento first($columns = ['*'])
*/
class ElementoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'secuencia',
        'nombre',
        'importancia',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Elemento::class;
    }
}
