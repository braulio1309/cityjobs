<?php

use App\Http\Controllers\CalendarUserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriasUserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\IndicadoresController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\OfertaCandidatoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\OfertaFavoritaController;
use App\Http\Controllers\ParaindexController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlanActivoController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SeguidoresUserController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\TipoplanController;
use App\Http\Controllers\TopeController;
use App\Http\Controllers\UserAdjController;
use App\Http\Controllers\UserLineaController;
use App\Http\Controllers\ValoracionesUserController;
use App\Http\Controllers\VisitaUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [ParaindexController::class,'index'])->name("inicio");


Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {


    Route::get("/dashboard", [DashboardController::class,'todos'])->name("dashboard");


    Route::get("/misdatos", function () {
        return Inertia\Inertia::render('Misdatos');
    })->name("misdatos");

    Route::put('/autolinea',[UserLineaController::class,'autolinea']);
    Route::put('/quitalinea',[UserLineaController::class,'quitalinea']);
    Route::post('/notileido/{notificacion}',[NotifyController::class,'leido']);

    Route::get('/tope-notificaciones',[TopeController::class,'notificaciones']);
    Route::get('/tope-mensajes',[TopeController::class,'mensajes']);
    Route::get('/contadores-left',[TopeController::class,'contadoresleft']);

    Route::get('/profesionales-destacados',[ParaindexController::class,'profdestacados']);

    Route::resource("calendaruser", CalendarUserController::class)->except(["show"]);
    Route::resource("categorias", CategoriaController::class)->except(["show"]);
    Route::resource("categoriasusuarios", CategoriasUserController::class)->except(["show"]);
    Route::resource("chat", ChatController::class)->except(["show"]);
    Route::patch('chat/leido/{quien_envia}',[ChatController::class,'leido'])->name('chat.leidos');
    Route::resource("especialidades", EspecialidadController::class)->except(["show"]);
    Route::resource("notificaciones", NotifyController::class)->except(["show"]);


    Route::resource("ofertas", OfertaController::class)->except(["show"]);

    Route::resource("ofertascandidatos", OfertaCandidatoController::class)->except(["show"]);
    Route::resource("ofertafavorita", OfertaFavoritaController::class)->except(["show"]);
    Route::resource("pedidos", PedidoController::class)->except(["show"]);
    Route::resource("planes", PlanController::class)->except(["show"]);
    Route::resource("planactivo", PlanActivoController::class)->except(["show"]);
    Route::resource("seguidores", SeguidoresUserController::class)->except(["show"]);
    Route::resource("subcategorias", SubcategoriaController::class)->except(["show"]);
    Route::resource("tipoplan", TipoplanController::class)->except(["show"]);
    Route::resource("useradj", UserAdjController::class)->except(["show"]);
    Route::resource("valoraciones", ValoracionesUserController::class)->except(["show"]);
    Route::resource("visitas", VisitaUserController::class)->except(["show"]);
});
