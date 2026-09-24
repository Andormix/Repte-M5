<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\EstatUser;
use Illuminate\Database\Eloquent\Model;

//Nuevo use
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements EstatUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'estatus',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function crearNuevoCarrito()
    {
        return $this->carritos()->create();
    }

     public function getDescompte()
    {
        $estatUsuari = $this->getEstatUsuari();
        return $estatUsuari->getDescompte();
    }

    protected function getEstatUsuari(): EstatUser {
        
        switch ($this->estatus) 
        {
            case 'Normal':
                return new NormalUser();
            case 'Original':
                return new OriginalUser();
            case 'Genuino':
                return new GenuinoUser();
            case 'Leyenda':
                return new LeyendaUser();
            default:
                return new NormalUser();
        }
    }
}
