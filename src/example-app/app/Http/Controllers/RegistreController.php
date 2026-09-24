<?php

namespace App\Http\Controllers;

// Uses
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\Carrito;
use App\Models\User;

class RegistreController extends Controller
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
            return view("registre", compact('llibres', 'nombreUsuario'));
        }
    }

    public function registrar(Request $request)
    {
        // Validar les dades de l'usuari abans
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear l'usuari
        $usuario = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'estatus' => 'Normal', // Amb 0 punts i estatus normal

        ]);

        // Iniciar sessió i redirigir al home
        Auth::login($usuario);

        // Crea una nova cistella per aquest usuari
        $nuevoCarrito = new Carrito(['user_id' => $usuario->id]);
        $nuevoCarrito->save();

        $maxElementosPorPagina = 20;
        $llibres = Llibre::paginate($maxElementosPorPagina);
        return $this->iniciar($llibres);
    }
}
