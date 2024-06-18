<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class integrantes extends Model
{
    use HasFactory;
    protected $primaryKey = "intId";


        protected $fillable = [
            'famId',
            'capId',
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



        public function encuesta()
    {
        return $this->belongsTo(encuestas::class, 'famId'); // 'encuesta_id' es la clave foránea en la tabla de integrantes que referencia a encuestas
    }



}
