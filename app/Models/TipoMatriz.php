<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoMatriz
 * @package App\Models
 * @version March 7, 2019, 11:40 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection Matriz
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property integer estado
 */
class TipoMatriz extends Model
{

    public $table = 'tipo_matriz';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matrizs()
    {
        return $this->hasMany(\App\Models\Matriz::class);
    }
}
