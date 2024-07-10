<?php

namespace App\Models;


use App\Http\Controllers\FamiliaController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barrios;

class encuestas extends Model
{
    use HasFactory;

    protected $primaryKey = "encuestaId";

    protected $fillable = [
        'accSalud1',
        'accSalud2',
        'accSalud3',
        'accSalud4',
        'accSalud5',
        'accSalud6',
        'accSalud7',
        'accSalud8',
        'accSalud9',
        'accMental1',
        'accMental2',
        'prSoysa',
        'alimantacion1',
        'alimentacion2',
        'alimentacion3',
        'alimentacion4',
        'partSocial',
        'vivienda1',
        'vivienda2',
        'vivienda3',
        'vivienda4',
        'vivienda5',
        'vivienda6',
        'vivienda7',
        'accBas1',
        'accBas2',
        'accBas3',
        'accBas4',
        'famId',
        'capId',
        'accSalud3_otro', // Nuevo campo agregado
        'accSalud4_otro',
        'accSalud9_otro',
        'prSoysa_otro',
        'vivienda2_otro',
    ];

    public function familia()
    {
        return $this->belongsTo(familias::class, 'famId');
    }

    public function integrantes()
    {
        return $this->hasMany(integrantes::class, 'famId', 'famId');
    }


    public function barrio()
    {
        return $this->belongsTo(barrios::class, 'barrioId', 'barrioId');
    }

}

