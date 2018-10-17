<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoUnidad
 * @package App\Models
 * @version October 16, 2018, 8:36 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection Unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property integer estado
 */
class TipoUnidad extends Model
{

    public $table = 'tipo_unidad';
    
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
    public function unidads()
    {
        return $this->hasMany(\App\Models\Unidad::class);
    }
}
