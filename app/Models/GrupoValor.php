<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class GrupoValor
 * @package App\Models
 * @version October 28, 2018, 1:09 pm -05
 *
 * @property \App\Models\TipoIndicador tipoIndicador
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property \Illuminate\Database\Eloquent\Collection Valoracion
 * @property integer tipo_indicador_id
 * @property string nombre
 * @property string descripcion
 * @property integer estado
 * @property  id
 */
class GrupoValor extends Model
{

    public $table = 'grupo_valor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'tipo_indicador_id',
        'nombre',
        'descripcion',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_indicador_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
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
    public function tipoIndicador()
    {
        return $this->belongsTo(\App\Models\TipoIndicador::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function valoracions()
    {
        return $this->hasMany(\App\Models\Valoracion::class);
    }
}
