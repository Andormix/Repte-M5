<?php

namespace App\Http\Controllers;

// Uses
use Illuminate\Support\Facades\Auth;
use App\Models\CarritoItem;
use App\Models\Carrito;
use App\Models\Llibre;
use App\Services\CarritoService;

class CarritoController extends Controller
{

    protected $carritoService;

    public function __construct(CarritoService $carritoService)
    {
        $this->carritoService = $carritoService;
    }

    public function buidar()
    {
        return $this->carritoService->buidarCarrito();
    }

    public function afegirProducte($id)
    {
        return $this->carritoService->afegirProducte($id);
    }

    public function eliminarProducte($id)
    {
        return $this->carritoService->eliminarProducte($id);
    }

    public function pagarCarrito()
    {
        return $this->carritoService->pagarCarrito();
    }

    public function totalItems()
    {
        // TODO
        return 0;
    }

    public function editarCantidad($id)
    {
        // Lógica para editar la cantidad
        $nuevaCantidad = request('cantidad'); // Obtener la nueva cantidad del formulario

        $carritoItem = CarritoItem::findOrFail($id);
        $carritoItem->editarQty($nuevaCantidad);
        
        $llibre = Llibre::findOrFail($carritoItem->llibre_id);

        // RT(enunciat)
        if ($nuevaCantidad <= $carritoItem->llibre->stock) 
        {
            $carritoItem->editarQty($nuevaCantidad);
            return redirect()->back()->with('abrirModal', true)->with('success', 'Quantitat actualitzada correctament. 😊 Llibre: ' . $llibre->titol);
        } 
        else 
        {
            $carritoItem->editarQty($carritoItem->llibre->stock);
            $carritoItem->save();
            return redirect()->back()->with('abrirModal', true)->with('success', 'No hi ha suficient estoc disponible. 🛒 Llibre: ' . $llibre->titol . ' Max: ' .  $carritoItem->llibre->stock);
        }
    }
}
