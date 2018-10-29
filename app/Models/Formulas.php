<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Formulas
 * @package App\Models
 * @version October 29, 2018, 10:24 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection FormulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property string abreviatura
 * @property string formula
 * @property integer estado
 */
class Formulas extends Model
{

    public $table = 'formulas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'abreviatura',
        'formula',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'abreviatura' => 'string',
        'formula' => 'string',
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
