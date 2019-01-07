<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ModeloCriterio
 * @package App\Models
 * @version January 5, 2019, 10:17 pm -05
 *
 * @property integer modelo_id
 * @property integer criterio_id
 */
class ModeloCriterio extends Model
{
    public $table = 'modelo_criterio';

    public $fillable = [
        'modelo_id',
        'criterio_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'modelo_id' => 'integer',
        'criterio_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}