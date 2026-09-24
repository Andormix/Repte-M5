<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llibre extends Model
{
    use HasFactory;

    protected $table = "llibres";

    public function getPreu()
    {
        return $this->preu;
    }

    public function calcularPreuEnviament(): float
    {
        $precioEnvio = 0;

        if ($this->tapa == 'blanda') {
            $precioEnvio = 1;
        } elseif ($this->tapa == 'dura') {
            $precioEnvio = 2;
        }
        return $precioEnvio;
    }
}
