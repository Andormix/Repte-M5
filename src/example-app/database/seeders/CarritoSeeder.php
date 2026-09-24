<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carrito;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $carrito = new Carrito();
        $carrito->user_id = 1;
        $carrito->save();

        $carrito = new Carrito();
        $carrito->user_id = 2;
        $carrito->save();
    }
}
