<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Evidencia
 * @package App\Models
 * @version January 10, 2019, 10:10 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection EstructuraEvidencia
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property string descripcion
 * @property integer importancia
 * @property integer estado
 */
class Evidencia extends Model
{

    public $table = 'evidencia';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'descripcion',
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
        'nombre' => 'string',
        'descripcion' => 'string',
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
    public function estructuraEvidencias()
    {
        return $this->hasMany(\App\Models\EstructuraEvidencias::class);
    }
}
