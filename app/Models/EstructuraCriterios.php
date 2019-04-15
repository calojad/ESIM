<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EstructuraCriterios
 * @package App\Models
 * @version January 10, 2019, 2:01 pm -05
 *
 * @property \App\Models\Criterio criterio
 * @property \App\Models\Modelo modelo
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection EstructuraIndicadore
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer modelo_id
 * @property integer criterio_id
 * @property integer padre_id
 * @property integer nivel
 */
class EstructuraCriterios extends Model
{

    public $table = 'estructura_criterios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'modelo_id',
        'criterio_id',
        'padre_id',
        'nivel',
        'abrebiado',
        'secuencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'modelo_id' => 'integer',
        'criterio_id' => 'integer',
        'padre_id' => 'integer',
        'nivel' => 'integer',
        'abrebiado' => 'string',
        'secuencia' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function childs() {
        return $this->hasMany('\App\Models\EstructuraCriterios','padre_id','id') ->orderBy('secuencia','asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function criterio()
    {
        return $this->belongsTo(\App\Models\Criterio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function criterio_padre()
    {
        return $this->belongsTo(\App\Models\Criterio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estructuraIndicadores()
    {
        return $this->hasMany('\App\Models\EstructuraIndicadores','estruc_crite_id','id')->orderBy('secuencia','asc');
    }
}
