<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Responsable
 * @package App\Models
 * @version February 11, 2019, 3:22 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection Carrera
 * @property \Illuminate\Database\Eloquent\Collection Departamento
 * @property \Illuminate\Database\Eloquent\Collection estructuraElementos
 * @property \Illuminate\Database\Eloquent\Collection estructuraEvidencias
 * @property \Illuminate\Database\Eloquent\Collection estructuraIndicadores
 * @property \Illuminate\Database\Eloquent\Collection formulaVariable
 * @property \Illuminate\Database\Eloquent\Collection unidad
 * @property \Illuminate\Database\Eloquent\Collection unidadCarrera
 * @property string nombre
 * @property string telefono
 * @property string gmail
 * @property string email_institu
 * @property string rol
 * @property string descripcion
 */
class Responsable extends Model
{

    public $table = 'responsable';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'telefono',
        'gmail',
        'email_institu',
        'rol',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'telefono' => 'string',
        'gmail' => 'string',
        'email_institu' => 'string',
        'rol' => 'string',
        'descripcion' => 'string'
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
    public function carreras()
    {
        return $this->hasMany(\App\Models\Carrera::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function departamentos()
    {
        return $this->hasMany(\App\Models\Departamento::class);
    }
}
