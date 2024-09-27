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

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    } 
}