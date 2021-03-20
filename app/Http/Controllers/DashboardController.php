<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    protected $total_ofertas;
    protected $total_activas;
    protected $valoraciones;
    protected $objetonoti;

    public function contadores() {

        $oferta = new OfertaController();
        $indicadores_oferta=$oferta->indicadores();

        $valoraciones = new ValoracionesUserController();
        $indicador_valoraciones=$valoraciones->indicador();

        $this->total_ofertas = $indicadores_oferta["total_ofertas"];
        $this->total_activas =$indicadores_oferta["total_activas"];
        $this->valoraciones = $indicador_valoraciones;

    }

    public function notificac()
    {
        $notificaciones=new NotifyController();
        $objetonoti=$notificaciones->notificaciones_ultimos(5);
        $this->objetonoti= $objetonoti;
    }

    public function todos()
    {
        $this->contadores();
        $this->notificac();
        return Inertia::render("Dashboard", ["objetodash"=>[
            "total_ofertas" => $this->total_ofertas,
            "total_activas" => $this->total_activas,
            "valoraciones" => $this->valoraciones,
            "objetonoti" => $this->objetonoti,
        ]]);
    }



}
