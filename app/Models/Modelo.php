<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Modelo
 * @package App\Models
 * @version January 4, 2019, 2:34 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection Criterio
 * @property \Illuminate\Database\Eloquent\Collection criterioIndicador
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection Indicador
 * @property \Illuminate\Database\Eloquent\Collection indicadorEvidencia
 * @property \Illuminate\Database\Eloquent\Collection Matriz
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property string abreviado
 * @property string descripcion
 * @property integer estado
 */
class Modelo extends Model
{

    public $table = 'modelo';
    
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
    public function criterios()
    {
        return $this->hasMany(\App\Models\Criterio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function indicadors()
    {
        return $this->hasMany(\App\Models\Indicador::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matrizs()
    {
        return $this->hasMany(\App\Models\Matriz::class);
    }
}
