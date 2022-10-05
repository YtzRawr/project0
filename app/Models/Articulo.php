<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        // los datos que se insertaran despues
        'codigo',
        'descripcion',
        'precio',
        'cantidad',
        'image',
    ];
}
