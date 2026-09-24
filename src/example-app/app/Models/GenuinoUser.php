<?php

namespace App\Models;
use App\Models\EstatUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenuinoUser implements EstatUser 
{
    public function getDescompte() 
    {
        return 10; // Descompte del 10%
    }
}
