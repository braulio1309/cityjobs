<?php

namespace App\Http\Controllers;

use App\Models\ValoracionesUser;
use Illuminate\Http\Request;

class ValoracionesUserController extends Controller
{
    public function indicador()
    {
        $recibida=ValoracionesUser::join("users",'users.id','valoraciones_users.recibe_valora_id')
        ->where("valoraciones_users.recibe_valora_id",auth()->id())->count();
        return $recibida;
    }
}
