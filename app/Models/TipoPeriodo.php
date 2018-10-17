<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoPeriodo
 * @package App\Models
 * @version October 16, 2018, 9:55 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection Periodo
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property integer estado
 */
class TipoPeriodo extends Model
{

    public $table = 'tipo_periodo';
    
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
    public function periodos()
    {
        return $this->hasMany(\App\Models\Periodo::class);
    }
}
