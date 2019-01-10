<?php

namespace App\Models;

use App\Rules\MayoraCero;
use Eloquent as Model;

/**
 * Class Indicador
 * @package App\Models
 * @version January 7, 2019, 5:48 pm -05
 *
 * @property \App\Models\Formula formula
 * @property \App\Models\GrupoValor grupoValor
 * @property \App\Models\TipoIndicador tipoIndicador
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection EstructuraIndicadore
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer tipo_indicador_id
 * @property integer grupo_valor_id
 * @property integer formula_id
 * @property string nombre
 * @property string descripcion
 * @property string estandar
 * @property string vigencia
 * @property string marco_normativo
 * @property string fuente_info
 * @property integer estado
 */
class Indicador extends Model
{

    public $table = 'indicador';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'tipo_indicador_id',
        'grupo_valor_id',
        'formula_id',
        'nombre',
        'descripcion',
        'estandar',
        'vigencia',
        'marco_normativo',
        'fuente_info',
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
        'grupo_valor_id' => 'integer',
        'formula_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'estandar' => 'string',
        'vigencia' => 'string',
        'marco_normativo' => 'string',
        'fuente_info' => 'string',
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
     * Validation rules
     *
     * @var array
     */
    public static $messages = [

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
    public function grupoValor()
    {
        return $this->belongsTo(\App\Models\GrupoValor::class);
    }

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
    public function estructuraIndicadores()
    {
        return $this->hasMany(\App\Models\EstructuraIndicadore::class);
    }
}
