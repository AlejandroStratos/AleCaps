<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EncuestasExportsView implements FromView
{
    protected $encuestas;

    public function __construct($encuestas)
    {
        $this->encuestas = $encuestas;
    }

    public function view(): View
    {
        // Pasar las encuestas filtradas a la vista de exportación
        return view('exports.encuestas', ['encuestas' => $this->encuestas]);
    }
}