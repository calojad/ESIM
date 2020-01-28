<?php

# Ubicacion app\Helpers\Helper_Cal.php

namespace App\Helpers;

class Helper_Cal
{
    public static function strUp(array &$data)
    {
        $data['nombre'] = mb_strtoupper($data['nombre']);
    }
}