<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EstructuraElementos
 * @package App\Models
 * @version January 10, 2019, 3:54 pm -05
 *
 * @property \App\Models\Elemento elemento
 * @property \App\Models\EstructuraEvidencia estructuraEvidencia
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer estruc_evide_id
 * @property integer elemento_id
 * @property string abrebiado
 */
class EstructuraElementos extends Model
{

    public $table = 'estructura_elementos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'estruc_evide_id',
        'elemento_id',
        'abrebiado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estruc_evide_id' => 'integer',
        'elemento_id' => 'integer',
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
    public function elemento()
    {
        return $this->belongsTo(\App\Models\Elemento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estructuraEvidencia()
    {
        return $this->belongsTo(\App\Models\EstructuraEvidencia::class);
    }
}
