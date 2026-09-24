<?php

namespace App\Models;
use App\Models\EstatUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginalUser implements EstatUser 
{
    public function getDescompte() 
    {
        return 5; // Descompte del 5%
    }
}
