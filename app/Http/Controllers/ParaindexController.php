<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ParaindexController extends Controller
{
    public function index()
    {
        $invitado = false;
        if (Auth::guest())
            $invitado = true;

        $total_usuarios = User::all()->count();
        $total_ofertas = Oferta::all()->count();

        return Inertia::render('Inicio', [
            'total_usrs' => $total_usuarios,
            'total_ofertas' => $total_ofertas,
            'invitados' => $invitado
        ]);
    }
}
