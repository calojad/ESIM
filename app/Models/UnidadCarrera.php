<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadCarrera extends Model
{
    public $table = 'unidad_carrera';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'usuario_id',
        'carrera_id',
        'periodo_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User','usuario_id');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera','carrera_id');
    }

    public function periodo()
    {
        return $this->belongsTo('App\Models\Periodo','periodo_id');
    }
}
