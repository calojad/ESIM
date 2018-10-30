<?php

namespace App\Repositories;

use App\Models\Variables;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VariablesRepository
 * @package App\Repositories
 * @version October 30, 2018, 8:45 am -05
 *
 * @method Variables findWithoutFail($id, $columns = ['*'])
 * @method Variables find($id, $columns = ['*'])
 * @method Variables first($columns = ['*'])
*/
class VariablesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'variable',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Variables::class;
    }
}
