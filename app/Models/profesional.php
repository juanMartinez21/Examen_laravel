<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesional extends Model
{
    use HasFactory;
    protected $fillable = ['nroDocumento','nombre','apellido','habilidades','salario','disponible'];//Atributos de la tabla
}
