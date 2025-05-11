<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /** @use HasFactory<\Database\Factories\PrestamoFactory> */
    use HasFactory;

    public function lector()
    {
        return $this->belongsTo(Lector::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetallePrestamo::class);
    }
}
