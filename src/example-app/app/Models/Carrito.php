<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carritos";
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carritoItems()
    {
        return $this->hasMany(CarritoItem::class);
    }

    public function totalElements()
    {
        return $this->carritoItems()->count();
    }

    public function calcularTotal()
    {
        $total = 0;

        foreach ($this->carritoItems as $carritoItem) 
        {
            // Aplicar descomptes aqui.
            $total += $carritoItem->Total();
        }

        return $total;
    }

    public function calcularTotalAmbDescompte()
    {
        $total = 0;

        foreach ($this->carritoItems as $carritoItem) 
        {
            // Aplicar descomptes aqui.
            $total += $carritoItem->Total();
        }

        $descompteUsuari = $this->user->getDescompte();
        // return round($total - ($total/(100/$descompteUsuari)), 2);
        return $descuento = ($descompteUsuari != 0) ? round($total - ($total/(100/$descompteUsuari)), 2) : $total;
    }

    public function calcularDescompte()
    {
        $total = 0;

        foreach ($this->carritoItems as $carritoItem) 
        {
            // Aplicar descomptes aqui.
            $total += $carritoItem->Total();
        }

        $descompteUsuari = $this->user->getDescompte();

        // Sol divisió per zero
        $descuento = ($descompteUsuari != 0) ? round(($total / (100 / $descompteUsuari)), 2) : 0;
        return $descuento;
    }

    public function buidar()
    {
        foreach ($this->carritoItems as $carritoItem) 
        {
           $carritoItem->eliminar();
        }
        return;
    }

    public function pagar()
    {
        // Tanquem la cistella actual
        if (!$this->pagado) {
            $this->pagado = true;
            $this->save();
        }

        // Crea una nova cistella
        $nuevoCarrito = new Carrito(['user_id' => $this->user_id]);
        $nuevoCarrito->save();

        return $nuevoCarrito;
    }

    public function getID()
    {
        return $this->id;
    }
}
