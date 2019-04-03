<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EstructuraEvidencias
 * @package App\Models
 * @version January 10, 2019, 3:35 pm -05
 *
 * @property \App\Models\EstructuraIndicadore estructuraIndicadore
 * @property \App\Models\Evidencium evidencium
 * @property \Illuminate\Database\Eloquent\Collection EstructuraElemento
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer estruc_indic_id
 * @property integer evidencia_id
 * @property string abrebiado
 */
class EstructuraEvidencias extends Model
{

    public $table = 'estructura_evidencias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'estruc_indic_id',
        'evidencia_id',
        'abrebiado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estruc_indic_id' => 'integer',
        'evidencia_id' => 'integer',
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
    public function estructuraIndicadore()
    {
        return $this->belongsTo(\App\Models\EstructuraIndicadores::class,'estruc_indic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function evidencia()
    {
        return $this->belongsTo(\App\Models\Evidencia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estructuraElementos()
    {
        return $this->hasMany(\App\Models\EstructuraElementos::class,'estruc_evide_id');
    }
}
