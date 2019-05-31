<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UsuarioAsignacion
 * @package App\Models
 * @version October 22, 2018, 11:04 am -05
 *
 * @property \App\Models\Carrera carrera
 * @property \App\Models\Periodo periodo
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer usuario_id
 * @property integer carrera_id
 * @property integer periodo_id
 */
class UsuarioAsignacion extends Model
{

    public $table = 'usuario_asignacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'usuario_id',
        'carrera_id',
        'departamento_id',
        'periodo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'usuario_id' => 'integer',
        'carrera_id' => 'integer',
        'departamento_id' => 'integer',
        'periodo_id' => 'integer'
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

    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class);
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
