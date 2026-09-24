<?php

namespace App\Models;
use App\Models\EstatUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeyendaUser implements EstatUser 
{
    public function getDescompte() 
    {
        return 15; // Descompte del 15%
    }
}
