<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En el modelo
class CarritoItem extends Model
{
    protected $fillable = ['carrito_id', 'llibre_id', 'cantidad', 'precio'];

    public function llibre()
    {
        return $this->belongsTo(Llibre::class);
    }

    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    public function TitolLlibre()
    {
        return $this->llibre->titol;
    }

    public function PreuLlibre()
    {
        return $this->llibre->getPreu();
    }

    public function Total()
    {
        return ($this->llibre->getPreu() * $this->cantidad);
    }

    public function eliminar()
    {
        $this->delete();
    }

    public function editarQty($qty)
    {
        $qty = max(0, intval($qty));

        // Actualizar la qty del carrito
        $this->cantidad = $qty;
        $this->save();
    }

}
