<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Criterio
 * @package App\Models
 * @version January 4, 2019, 5:39 pm -05
 *
 * @property \App\Models\Modelo modelo
 * @property \Illuminate\Database\Eloquent\Collection CriterioIndicador
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection indicadorEvidencia
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property integer modelo_id
 * @property string nombre
 * @property string abreviado
 * @property integer nivel
 * @property string descripcion
 * @property integer criterio_padre_id
 * @property integer estado
 */
class Criterio extends Model
{

    public $table = 'criterio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'modelo_id',
        'nombre',
        'abreviado',
        'nivel',
        'descripcion',
        'criterio_padre_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'modelo_id' => 'integer',
        'nombre' => 'string',
        'abreviado' => 'string',
        'nivel' => 'integer',
        'descripcion' => 'string',
        'criterio_padre_id' => 'integer',
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
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function criterioIndicadors()
    {
        return $this->hasMany(\App\Models\CriterioIndicador::class);
    }
}
