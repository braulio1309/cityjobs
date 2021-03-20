<?php

namespace App\Http\Controllers;

use App\Models\CategoriasUser;
use Inertia\Inertia;

class CategoriasUserController extends Controller
{
    public function index() {

        return Inertia::render("CategoriasUser/Index", [
            "categoriasusuario" => CategoriasUser::with("user")
                ->join("categorias",'categorias.id','=','categorias_users.categoria')
                ->join("subcategorias",'subcategorias.id','=','categorias_users.subcatego')
                ->join("especialidades",'especialidades.id','=','categorias_users.especialida')
                ->orderBy("categorias.nombre","subcatego.nombre","especialida.nombre"),
        ]);
    }

    public function create() {
        return Inertia::render("categoriasusuario/Create");
    }

    public function store() {
        CategoriasUser::create(
            $this->validate(request(), [
                "categoria" => "required",
                "subcatego" => "required",
                "especialida" => "required",
            ])
        );

        return redirect()->route('categoriasusuario.index')->with('success', '¡Categoría añadida correctamente!');
    }

    public function destroy(CategoriasUser $categoriasusuario) {
        $categoriasusuario->delete();
        return redirect()->route('categoriasusuario.index')->with('success', '¡Categoría eliminada correctamente!');
    }
}
