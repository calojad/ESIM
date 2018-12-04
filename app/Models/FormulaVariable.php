<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FormulaVariable
 * @package App\Models
 * @version December 4, 2018, 4:28 pm -05
 *
 * @property \App\Models\Formula formula
 * @property \App\Models\Variable variable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer formula_id
 * @property integer variable_id
 */
class FormulaVariable extends Model
{

    public $table = 'formula_variable';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'formula_id',
        'variable_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'formula_id' => 'integer',
        'variable_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formula()
    {
        return $this->belongsTo(\App\Models\Formula::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function variable()
    {
        return $this->belongsTo(\App\Models\Variable::class);
    }
}
