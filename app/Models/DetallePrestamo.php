<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    /** @use HasFactory<\Database\Factories\DetallePrestamoFactory> */
    use HasFactory;

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
