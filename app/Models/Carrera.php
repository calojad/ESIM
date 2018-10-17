<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Carrera
 * @package App\Models
 * @version October 16, 2018, 4:31 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection UnidadCarrera
 * @property string nombre
 * @property integer estado
 */
class Carrera extends Model
{

    public $table = 'carrera';
    
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
    public function unidadCarreras()
    {
        return $this->hasMany(\App\Models\UnidadCarrera::class);
    }
}
