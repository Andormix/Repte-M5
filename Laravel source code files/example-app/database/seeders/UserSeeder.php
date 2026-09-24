<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name ="Montse";
        $user->estatus ="Leyenda";
        $user->email = 'mpelliçer@uda.ad';
        $user->password = 'Contrasenya77';
        $user->puntos = 75;
        $user->save();

        $user = new User();
        $user->name ="Edward";
        $user->estatus ="Normal";
        $user->email = 'defias@brotherhood.ad';
        $user->password = 'Contrasenya88';
        $user->puntos = 0;
        $user->save();
    }
}
