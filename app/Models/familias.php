<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familias extends Model
{
    use HasFactory;
    protected $primaryKey = "famId";

    public function encuesta()
{
    return $this->hasOne(encuestas::class, 'famId');
}

public function integrantes()
{
    return $this->hasMany(integrantes::class, 'famId');
}
}
