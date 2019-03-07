<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Matriz
 * @package App\Models
 * @version February 11, 2019, 10:22 am -05
 *
 * @property \App\Models\Carrera carrera
 * @property \App\Models\Departamento departamento
 * @property \App\Models\Modelo modelo
 * @property \App\Models\Periodo periodo
 * @property \App\Models\TipoEvaluacion tipoEvaluacion
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer modelo_id
 * @property integer periodo_id
 * @property integer carrera_id
 * @property integer departamento_id
 * @property integer tipo_evaluacion_id
 * @property string nombre
 * @property integer estado
 */
class Matriz extends Model
{

    public $table = 'matriz';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'modelo_id',
        'periodo_id',
        'carrera_id',
        'tipo_matriz_id',
        'tipo_evaluacion_id',
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
        'modelo_id' => 'integer',
        'periodo_id' => 'integer',
        'carrera_id' => 'integer',
        'departamento_id' => 'integer',
        'tipo_evaluacion_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function carrera()
    {
        return $this->belongsTo(\App\Models\Carrera::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoEvaluacion()
    {
        return $this->belongsTo(\App\Models\TipoEvaluacion::class);
    }
}
