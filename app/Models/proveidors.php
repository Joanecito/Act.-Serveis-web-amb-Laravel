<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveidors extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'poblacion', 'cif'
    ];
}
