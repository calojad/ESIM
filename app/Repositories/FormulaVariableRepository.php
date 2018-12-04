<?php

namespace App\Repositories;

use App\Models\FormulaVariable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormulaVariableRepository
 * @package App\Repositories
 * @version December 4, 2018, 4:28 pm -05
 *
 * @method FormulaVariable findWithoutFail($id, $columns = ['*'])
 * @method FormulaVariable find($id, $columns = ['*'])
 * @method FormulaVariable first($columns = ['*'])
*/
class FormulaVariableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'formula_id',
        'variable_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormulaVariable::class;
    }
}
