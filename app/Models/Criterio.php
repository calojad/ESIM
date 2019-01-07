<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Criterio
 * @package App\Models
 * @version January 7, 2019, 2:23 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection EstructuraCriterio
// * @property \Illuminate\Database\Eloquent\Collection EstructuraCriterio
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property string abreviado
 * @property string descripcion
 * @property integer estado
 */
class Criterio extends Model
{

    public $table = 'criterio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'abreviado',
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
        'nombre' => 'string',
        'abreviado' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    /*public function estructuraCriterios()
    {
        return $this->hasMany(\App\Models\EstructuraCriterio::class);
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    /*public function estructuraCriterios()
    {
        return $this->hasMany(\App\Models\EstructuraCriterio::class);
    }*/
}
