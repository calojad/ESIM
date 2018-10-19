<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadCarrera extends Model
{
    public $table = 'unidad_carrera';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'unidad_id',
        'carrera_id'
    ];

    public function unidad()
    {
        return $this->belongsTo('App\Unidad','unidad_id');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera','carrera_id');
    }
}
