<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\Carrito;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $maxElementosPorPagina = 20;
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
            $carritos = Carrito::where('user_id', $usuario->id)->where('pagado', true)->get();

            return view("dashboard", compact('llibres', 'nombreUsuario', 'carrito', 'usuario', 'carritos'));
        } 
        else 
        {
            $nombreUsuario = "guest";
            return view("home", compact('llibres', 'nombreUsuario'));
        }
    }
}
