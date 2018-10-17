<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Unidad
 * @package App\Models
 * @version October 16, 2018, 11:57 am -05
 *
 * @property \App\Models\TipoUnidad tipoUnidad
 * @property \App\Models\Ubicacion ubicacion
 * @property \Illuminate\Database\Eloquent\Collection UnidadCarrera
 * @property integer tipo_unidad_id
 * @property integer ubicacion_id
 * @property string nombre
 * @property integer estado
 */
class Unidad extends Model
{

    public $table = 'unidad';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'tipo_unidad_id',
        'ubicacion_id',
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
        'tipo_unidad_id' => 'integer',
        'ubicacion_id' => 'integer',
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
    public function tipoUnidad()
    {
        return $this->belongsTo(\App\Models\TipoUnidad::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ubicacion()
    {
        return $this->belongsTo(\App\Models\Ubicacion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function unidadCarreras()
    {
        return $this->hasMany(\App\Models\UnidadCarrera::class);
    }
}
