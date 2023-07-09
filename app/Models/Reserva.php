<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rut',
        'telefono',
        'email',
    ];
    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }
}
