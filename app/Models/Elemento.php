<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Elemento
 * @package App\Models
 * @version January 10, 2019, 11:34 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection EstructuraElemento
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer secuencia
 * @property string nombre
 * @property integer importancia
 * @property integer estado
 */
class Elemento extends Model
{

    public $table = 'elemento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'secuencia',
        'nombre',
        'importancia',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'secuencia' => 'integer',
        'nombre' => 'string',
        'importancia' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estructuraElementos()
    {
        return $this->hasMany(\App\Models\EstructuraElemento::class);
    }
}
