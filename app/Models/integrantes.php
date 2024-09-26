<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Calcula la edad automáticamente
    protected $appends = ['edad'];

    public function getEdadAttribute()
    {
        if ($this->fechaNac) {
            return Carbon::parse($this->fechaNac)->age;
        }
        return null;
    }
}