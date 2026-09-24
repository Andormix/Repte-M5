<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Llibre;
use Illuminate\Database\Seeder;

class LlibreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Llibre::factory(1000)->create();
    }
}
