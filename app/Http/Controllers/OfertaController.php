<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return Inertia::render("Oferta/Index", [
            "ofertas" => Oferta::with("user")
                ->orderByDesc("id"),
        ]);
    }

    public function create() {
        return Inertia::render("Oferta/Create");
    }

    public function indicadores()
    {
        $total_ofertas=Oferta::with("user")->get()->count();
        $total_activas=Oferta::with("user")->where("estatus",1)->get()->count();
        return ["total_ofertas"=>$total_ofertas,"total_activas"=>$total_activas];
    }

    public function store() {
        Oferta::create(  //terminar de hacereste y los demas
            $this->validate(request(), [
                "titulo" => "required",
                "hora_inicio" => "required|time",
                "hora_fin" => "required|time",
                "user_contratado" => "required",
            ])
        );

        return redirect()->route('oferta.index')->with('success', 'Oferta creado!');
    }
}
