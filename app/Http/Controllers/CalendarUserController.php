<?php

namespace App\Http\Controllers;

use App\Models\CalendarUser as ModelsCalendarUser;

use Inertia\Inertia;

class CalendarUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return Inertia::render("Calendario/Index", [
            "calendaruser" => ModelsCalendarUser::with("user")
                ->orderByDesc("id"),
        ]);
    }

    public function create() {
        return Inertia::render("Calendario/Create");
    }

    public function store() {
        ModelsCalendarUser::create(
            $this->validate(request(), [
                "fecha_dia" => "required|date",
                "hora_inicio" => "required|time",
                "hora_fin" => "required|time",
                "user_contratado" => "required",
            ])
        );
// Cambiar a la ruta que es segun el agregar de la oferta o segun la contratacion
        return redirect()->route('calendaruser.index')->with('success', 'Evento creado!');
    }

}
