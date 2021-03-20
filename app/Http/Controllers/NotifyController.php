<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class NotifyController extends Controller
{
    public function index() {
        return Inertia::render("Notis/Index", [
            "notificaciones" => Notify::join("users",'users.id','=','notifies.quien_recibe')
            ->select('icono','mensaje','notifies.created_at','notifies.id')
            ->where([['notifies.quien_recibe','=',auth()->id()],['estatus',0]])
            ->orderByDesc('notifies.created_at')->get()
        ]);

    }

    public static function leido()
    {

        $notificacion = Notify::findOrFail(request()->notificacion);
        $notificacion->estatus=1;
        $notificacion->save();

    }

    public function notificaciones_ultimos($cuantos) {
        $notificaciones= Notify::join("users",'users.id','=','notifies.quien_recibe')
        ->select('icono','mensaje','notifies.created_at','notifies.id')
        ->where([['notifies.quien_recibe','=',auth()->id()],['estatus',0]])
        ->orderByDesc('notifies.created_at')
        ->limit($cuantos)->get();

        return
            [
                "totalnostis" => count($notificaciones),
                "notificaciones" => $notificaciones,
            ];
    }

    public function create() {
        return Inertia::render("Notis/Create");
    }

    public function store() {
        Notify::create(
            $this->validate(request(), [
                "quien_envia" => "required",
                "quien_recibe" => "required",
                "mensaje" => "required|max:1000",
            ])
        );

        return redirect()->route('notificaciones.index')->with('success', 'Notificación enviada!');
    }
}
