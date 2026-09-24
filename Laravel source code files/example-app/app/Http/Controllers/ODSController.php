<?php

namespace App\Http\Controllers;

// Uses
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\Carrito;

class ODSController extends Controller
{
    public function __invoke()
    {
        $maxElementosPorPagina = 50;
        $llibres = Llibre::paginate($maxElementosPorPagina);

        return $this->iniciar($llibres);
    }

    private function iniciar($llibres)
    {
        // Verifica si l'usuari esta autenticat
        if (Auth::check()) {
            
            // Obtindre l'usuari si està autenticat
            $usuario = Auth::user();
            $nombreUsuario = $usuario->name;
            $carrito = Carrito::where('user_id', $usuario->id)->where('pagado', false)->first();

            return view("ODS", compact('llibres', 'nombreUsuario', 'carrito', 'usuario'));
        } 
        else 
        {
            $nombreUsuario = "guest";
            return view("ODS", compact('llibres', 'nombreUsuario'));
        }
    }
}
