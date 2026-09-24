<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\CarritoItem;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;

class ProductesController extends Controller
{
    public function __invoke()
    {
        $maxElementosPorPagina = 50;
        $llibres = Llibre::paginate($maxElementosPorPagina);

        return $this->iniciar($llibres);
    }

    public function filtrarLibros(Request $request)
    {

        // Obtén los valores de precio y categoría del formulario
        $precioMin = $request->input('precio_min', 0);
        $precioMax = $request->input('precio_max', PHP_FLOAT_MAX);
        $categoria = $request->input('categoria');

        // Filtra los libros según los valores proporcionados
        $query = Llibre::whereBetween('preu', [$precioMin, $precioMax]);

        if ($categoria != 'Totes') {
            $query->where('categoria', $categoria);
        }

        // Obtiene los resultados paginados
        $llibres = $query->orderBy('preu')->paginate(50);

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

            return view("productes", compact('llibres', 'nombreUsuario', 'carrito', 'usuario'));
        } 
        else 
        {
            $nombreUsuario = "guest";
            return view("productes", compact('llibres', 'nombreUsuario'));
        }
    }
}

