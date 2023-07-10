<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserva;


class Funcion extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'fecha', 'hora', 'imagen', 'numero_reservas'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
