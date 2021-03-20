<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TopeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notificaciones() {

     // validar que ha verificado el correo
        $notificaciones=new NotifyController();
        $objetonoti=$notificaciones->notificaciones_ultimos(5);

        return response()->json($objetonoti);
    }

    public function mensajes() {

        $chats=new ChatController();
        $objetochat=$chats->chat_ultimos(5);

        return response()->json($objetochat);

    }

    public function contadoresleft(){

        $chats=new ChatController();
        $objetochat=$chats->chat_ultimos(5);

        $notificaciones=new NotifyController();
        $objetonoti=$notificaciones->notificaciones_ultimos(5);

        return response()->json(
            [
                "totalsmsl" => $objetochat["totalsms"],
                "totalnostisl" => $objetonoti["totalnostis"],

            ]);
    }

}
