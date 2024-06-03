<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class integrantes extends Model
{
    use HasFactory;
    protected $primaryKey = "intId";

    
        protected $fillable = [
            'apellido',
            'nombre',
            'fechaNac',
            'estadoDni',
            'genero',
            'nacionalidad',
            'vinculo',
            'nivelEduc',
            'ocupacion',
            'progSocial',
            'obraSocial',
            'enfermedadesCronicas',
            'ultimoControl',
        ];
    
}
