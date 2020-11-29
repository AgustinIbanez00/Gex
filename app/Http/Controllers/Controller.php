<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //Errores
    public function Error($data, $code, $text)
    {
        return response()->json([
            'data' => $data,
            'error' => $code,
            'message' => $text
        ]);
    }

    public function Ok($data, $text = null){
        return response()->json([
            'data' => $data,
            'error' => null,
            'message' => $text
        ]);
    }


    const ERROR_DATABASE = 1;    

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
