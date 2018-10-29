<?php

namespace App\Repositories;

use App\Models\Formulas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormulasRepository
 * @package App\Repositories
 * @version October 29, 2018, 10:24 am -05
 *
 * @method Formulas findWithoutFail($id, $columns = ['*'])
 * @method Formulas find($id, $columns = ['*'])
 * @method Formulas first($columns = ['*'])
*/
class FormulasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'abreviatura',
        'formula',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Formulas::class;
    }
}
