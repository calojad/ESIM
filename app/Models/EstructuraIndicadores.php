<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EstructuraIndicadores
 * @package App\Models
 * @version January 10, 2019, 3:34 pm -05
 *
 * @property \App\Models\EstructuraCriterio estructuraCriterio
 * @property \App\Models\Indicador indicador
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection EstructuraEvidencia
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer estruc_crite_id
 * @property integer indicador_id
 * @property string abrebiado
 */
class EstructuraIndicadores extends Model
{

    public $table = 'estructura_indicadores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'estruc_crite_id',
        'indicador_id',
        'abrebiado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estruc_crite_id' => 'integer',
        'indicador_id' => 'integer',
        'abrebiado' => 'string'
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
    public function estructuraCriterio()
    {
        return $this->belongsTo(\App\Models\EstructuraCriterio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function indicador()
    {
        return $this->belongsTo(\App\Models\Indicador::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estructuraEvidencias()
    {
        return $this->hasMany(\App\Models\EstructuraEvidencia::class);
    }
}
