<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barrios extends Model
{
    use HasFactory;
    protected $primaryKey = "barrioId";

    //BARRIOS------------------------------------------
    protected $fillable = ['nombreBarrio', 'capId'];
}
