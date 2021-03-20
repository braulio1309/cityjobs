<?php

namespace App\Http\Controllers;

use App\Models\UserLinea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserLineaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function autolinea(Request $request)
    {
        UserLinea::actualiza(1);
    }

    public function quitalinea(Request $request)
    {
        UserLinea::actualiza(0);
    }

}
