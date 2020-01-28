<?php

namespace App\Repositories;

use App\Models\Responsable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResponsableRepository
 * @package App\Repositories
 * @version February 11, 2019, 3:22 pm -05
 *
 * @method Responsable findWithoutFail($id, $columns = ['*'])
 * @method Responsable find($id, $columns = ['*'])
 * @method Responsable first($columns = ['*'])
*/
class ResponsableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'telefono',
        'gmail',
        'email_institu',
        'cargo',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Responsable::class;
    }
}
