<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    /** @use HasFactory<\Database\Factories\LectorFactory> */
    use HasFactory;
    // esto es para que el nombre de la tabla no sea plural
    protected $table = 'lectores';
    protected $fillable = [
        'nombres',
        'apellidos',
        'sexo',
        'correo',
        'celular'
    ];
}
