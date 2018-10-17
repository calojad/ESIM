<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoEvaluacion
 * @package App\Models
 * @version October 16, 2018, 9:29 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property integer estado
 */
class TipoEvaluacion extends Model
{

    public $table = 'tipo_evaluacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
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
        'estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
