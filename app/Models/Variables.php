<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Variables
 * @package App\Models
 * @version October 30, 2018, 8:45 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection FormulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string descripcion
 * @property string variable
 * @property integer estado
 */
class Variables extends Model
{

    public $table = 'variables';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'descripcion',
        'variable',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'variable' => 'string',
        'estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formulaVariables()
    {
        return $this->hasMany(\App\Models\FormulaVariable::class);
    }
}
