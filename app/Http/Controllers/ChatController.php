<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use DateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index() {
        $usuarios=Chat::join("users",'users.id','=','chats.quien_envia')
        ->select('chats.quien_envia as usuario','users.name as nombre' ,'users.profile_photo_path as foto','users.enlinea as linea','chats.created_at')
        ->where('chats.quien_recibe','=',auth()->id())
        ->groupBy('chats.quien_envia','users.name','users.profile_photo_path','users.enlinea','chats.created_at')
        ->orderByDesc('chats.created_at')
        ->orderBy('chats.quien_envia')->get();

        $loschats=array();

        foreach($usuarios as $uno)
        {
            $sms=Chat::select('chats.id','chats.created_at','chats.mensaje', 'chats.quien_recibe')
            ->where([['chats.quien_recibe','=',auth()->id()],['chats.quien_envia','=',$uno->usuario]])
            ->orWhere([['chats.quien_envia','=',auth()->id()],['chats.quien_recibe','=',$uno->usuario]])
            ->orderBy('chats.created_at')
            ->get();
            $loschats[]=
             [
                 "id"=>$uno->usuario,
                 "foto"=>$uno->foto,
                 "nombre"=>$uno->nombre,
                 "ultimo_chat"=>$sms->last()->mensaje,
                 "ultimo_time"=>$sms->last()->created_at,
                 "ultimo_id"=>$sms->last()->id,
                 "todos"=>$sms
             ]
            ;

        }

        return Inertia::render("Chat/Index", [
            "chats" =>$loschats
        ]);

    }

    public function chat_ultimos($cuantos){

        $mensajes= Chat::join("users",'users.id','=','chats.quien_envia')
        ->select('users.name','users.profile_photo_path','users.enlinea','mensaje','chats.created_at')
        ->where([['chats.quien_recibe','=',auth()->id()],['estatus',0]])
        ->orderByDesc('chats.created_at')
        ->limit($cuantos)->get();
        return [
            "totalsms" => count($mensajes),
            "mensajes" => $mensajes,

        ];
    }


    public function leido(Request $request){
        $chatis = Chat::where([['quien_recibe','=',auth()->id()],['quien_envia',$request->quien_envia],['estatus',0]])->get();
        foreach($chatis as $unchat)
         {
             $unchat->estatus=1;
             $unchat->save();
         }
         return redirect()->route('chat.index')->with('success', 'Leidos!');
    }


    public function store() {
        Chat::create(
            $this->validate(request(), [
                "quien_envia" => "required",
                "quien_recibe" => "required",
                "mensaje" => "required|max:1000",
            ])
        );

        return redirect()->route('chat.index')->with('success', '¡Mensaje enviado!');
    }

}
