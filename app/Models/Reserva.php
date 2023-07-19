<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Funcion;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rut',
        'telefono',
        'email',
        'codigo_validacion', // Agregado el campo 'codigo_validacion' al arreglo $fillable
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reserva) {
            $reserva->codigo_validacion = Str::random(8);
        });
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }
}
