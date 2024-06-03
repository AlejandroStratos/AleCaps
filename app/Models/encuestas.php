<?php

namespace App\Models;

use App\Http\Controllers\FamiliaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
