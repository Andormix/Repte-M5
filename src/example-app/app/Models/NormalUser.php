<?php

namespace App\Models;
use App\Models\EstatUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalUser implements EstatUser 
{
    public function getDescompte() 
    {
        return 0; // Sense descompte
    }
}