<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Periodo
 * @package App\Models
 * @version October 16, 2018, 10:05 am -05
 *
 * @property \App\Models\TipoPeriodo tipoPeriodo
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer tipo_periodo_id
 * @property string nombre
 * @property date fecha_inicio
 * @property date fecha_fin
 * @property integer estado
 */
class Periodo extends Model
{

    public $table = 'periodo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'tipo_periodo_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_periodo_id' => 'integer',
        'nombre' => 'string',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
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
    public function tipoPeriodo()
    {
        return $this->belongsTo(\App\Models\TipoPeriodo::class);
    }
}
