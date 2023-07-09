<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'fecha', 'hora', 'imagen', 'numero_reservas'];
}

