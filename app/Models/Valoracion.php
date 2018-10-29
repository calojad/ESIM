<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Valoracion
 * @package App\Models
 * @version October 28, 2018, 3:57 pm -05
 *
 * @property \App\Models\GrupoValor grupoValor
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer grupo_valor_id
 * @property string nombre
 * @property string abreviatura
 * @property decimal valor
 * @property decimal rango_inicio
 * @property decimal rango_fin
 * @property string color
 * @property integer estado
 */
class Valoracion extends Model
{

    public $table = 'valoracion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'grupo_valor_id',
        'nombre',
        'abreviatura',
        'valor',
        'rango_inicio',
        'rango_fin',
        'color',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'grupo_valor_id' => 'integer',
        'nombre' => 'string',
        'abreviatura' => 'string',
        'color' => 'string',
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
    public function grupoValor()
    {
        return $this->belongsTo(\App\Models\GrupoValor::class);
    }
}
