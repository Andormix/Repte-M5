<?php

namespace App\Services;

use App\Models\CarritoItem;
use App\Models\Carrito;
use App\Models\Llibre;
use Illuminate\Support\Facades\Auth;

class CarritoService
{
    public function buidarCarrito()
    {
        // Obtenim l'usuari autenticat i el seu ID
        $usuario = Auth::user();
        $idUsuario = $usuario->id;

        // Obtenim la cistella associada al client
        $carrito = Carrito::where('user_id', $usuario->id)->where('pagado', false)->first();
        $carrito->buidar();

        return redirect()->back()->with('abrirModal', true)->with('success', 'Cistella buidada! (Service) 🗑️');
    }

    public function pagarCarrito()
    {
        // Obtenim l'usuari autenticat i el seu ID
        $usuario = Auth::user();
        $idUsuario = $usuario->id;

        // Obtenim la cistella associada al client
        $carrito = Carrito::where('user_id', $usuario->id)->where('pagado', false)->first();
        $carrito->pagar();

        //Actualitza l'estatus de l'usuari
        $usuario->puntos += $carrito->calcularTotalAmbDescompte();
        if($usuario->puntos >= 150)
        {
            $usuario->estatus = "Leyenda";
        }
        else if ($usuario->puntos >= 100)
        {
            $usuario->estatus = "Genuino";
        }
        else if (($usuario->puntos >= 50))
        {
            $usuario->estatus = "Original";
        }
        else
        {
            $usuario->estatus = "Normal";
        }

        $usuario->save();


        foreach ($carrito->carritoItems as $carritoItem)
        {
            $llibre = Llibre::findOrFail($carritoItem->llibre_id);
            $llibre->stock -= $carritoItem->cantidad;
            $llibre->save();

        } 

        return redirect()->back()->with('abrirModal', true)->with('success', 'Carrito pagat! (Service) 🗑️');
    }

    public function afegirProducte($id)
    {
        // Obtenim l'usuari autenticat i el seu ID
        $usuario = Auth::user();
        $idUsuario = $usuario->id;

        // Crequem el llibre
        $llibre = Llibre::findOrFail($id);

        // Obtenim la cistella associada al client
        $carrito = Carrito::where('user_id', $usuario->id)->where('pagado', false)->first();

        // Busquem si el llibre ja està afegit a a cistella.
        $carritoItem = CarritoItem::where('carrito_id', $carrito->getID())->where('llibre_id', $id)->first();

        if ($carritoItem)  // Si està, incrementa la quantitat
        {
            $carritoItem->cantidad++;
            $carritoItem->save();
        } 
        else // Si no està, creem una nova instància.
        {
            CarritoItem::create([
                'llibre_id' => $id,
                'carrito_id' => $carrito->getID(),
                'cantidad' => 1,
            ]);
        }

        $carritoItem = CarritoItem::where('carrito_id', $carrito->getID())->where('llibre_id', $id)->first();

        // RT(enunciat)
        if ($carritoItem->cantidad <= $carritoItem->llibre->stock) 
        {
             // Fem un redirect amb un missatge flash
            return redirect()->back()->with('success', 'Genial! 🎉 Has afegit "' . $llibre->titol . '" de ' . $llibre->autor . ' a la cistella 📚');
        } 
        else 
        {
            $carritoItem->cantidad--;
            $carritoItem->save();
            return redirect()->back()->with('abrirModal', true)->with('success', 'No hi ha suficient estoc disponible. 🛒 Llibre: ' . $llibre->titol . ' Max: ' . $llibre->stock);
        }      
    }

    public function eliminarProducte($id)
    {
        // Eliminació del producte
        $llibreID = CarritoItem::findOrFail($id)->llibre->id;
        $llibre = Llibre::findOrFail($llibreID);
        CarritoItem::destroy($id);
 
        return redirect()->back()->with('abrirModal', true)->with('success', 'Eliminació exitosa! 🗑️ Has retirat "' . $llibre->titol . ' de la cistella.');
    }
 
}