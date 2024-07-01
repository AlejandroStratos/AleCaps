<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarriosSeeder extends Seeder
{
    public function run()
    {
        $barrios = [
            ['nombreBarrio' => 'Juan Domingo Peron (uocra)', 'capId' => 1],
            ['nombreBarrio' => 'San Francisco', 'capId' => 1],
            ['nombreBarrio' => 'Prosperidad', 'capId' => 1],
            ['nombreBarrio' => 'Solidaridad', 'capId' => 1],
            ['nombreBarrio' => 'Abuelos', 'capId' => 1],
            ['nombreBarrio' => '26 viviendas', 'capId' => 1],
            ['nombreBarrio' => 'Emergencias', 'capId' => 1],
            ['nombreBarrio' => 'AECA', 'capId' => 1],
            ['nombreBarrio' => 'Obrador', 'capId' => 1],
            ['nombreBarrio' => 'Villa Fidelidad', 'capId' => 2],
            ['nombreBarrio' => 'Villa Mitre', 'capId' => 2],
            ['nombreBarrio' => 'Uocra', 'capId' => 2],  
            ['nombreBarrio' => 'Las Moradas', 'capId' => 2],
            ['nombreBarrio' => 'Bidegain', 'capId' => 2],
            ['nombreBarrio' => 'Campus Universitario', 'capId' => 2],
            ['nombreBarrio' => 'Villa Piazza Norte', 'capId' => 3],
            ['nombreBarrio' => 'Villa Piazza Centro', 'capId' => 3],
            ['nombreBarrio' => 'Monte Viggiano', 'capId' => 4],
            ['nombreBarrio' => 'Alfonsina Storni', 'capId' => 4],
            ['nombreBarrio' => '16 de diciembre', 'capId' => 4],
            ['nombreBarrio' => 'Elsa Oroquiesta', 'capId' => 4],
            ['nombreBarrio' => 'Chaparral', 'capId' => 4],
            ['nombreBarrio' => 'Solidaridad', 'capId' => 4],
            ['nombreBarrio' => 'Mariano Moreno', 'capId' => 4],
            ['nombreBarrio' => 'Bancario', 'capId' => 4],
            ['nombreBarrio' => 'Pedro Brugos', 'capId' => 5],
            ['nombreBarrio' => 'Ciudad de Azul', 'capId' => 5],
            ['nombreBarrio' => 'Carlos Gardel', 'capId' => 5],
            ['nombreBarrio' => 'Santa Lucía', 'capId' => 5],
            ['nombreBarrio' => 'Barrio Carus', 'capId' => 5],
            ['nombreBarrio' => 'Luz y Fuerza', 'capId' => 5],
            ['nombreBarrio' => 'Plan Federal', 'capId' => 5],
            ['nombreBarrio' => 'Urioste', 'capId' => 6],
            ['nombreBarrio' => '24 viviendas', 'capId' => 6],
            ['nombreBarrio' => '104 viviendas', 'capId' => 6],
            ['nombreBarrio' => 'Plan Federal', 'capId' => 6],
            ['nombreBarrio' => 'Del Carmen', 'capId' => 6],
            ['nombreBarrio' => 'De Paula', 'capId' => 6],
            ['nombreBarrio' => 'Plan Federal', 'capId' => 8],
            ['nombreBarrio' => 'Villa Piazza Sur', 'capId' => 8],
            ['nombreBarrio' => 'Plaza lubinas', 'capId' => 9],
            ['nombreBarrio' => 'Villa SizBarrio', 'capId' => 9],
            ['nombreBarrio' => 'La Tosquera', 'capId' => 9],
            ['nombreBarrio' => 'Barrio Municipal Plan Abuelos', 'capId' => 9],
            ['nombreBarrio' => 'Cachari', 'capId' => 11],
            ['nombreBarrio' => 'Chillar', 'capId' => 12],             
            ['nombreBarrio' => 'Villa Giammatolo', 'capId' => 13],
            ['nombreBarrio' => 'San Martin de Porres', 'capId' => 13],
            ['nombreBarrio' => 'Catamarca', 'capId' => 13],
            ['nombreBarrio' => 'Botanica', 'capId' => 13],
            ['nombreBarrio' => 'El Sol', 'capId' => 13],
            ['nombreBarrio' => 'Federal', 'capId' => 13],
            ['nombreBarrio' => 'Soempa', 'capId' => 13],
            ['nombreBarrio' => 'San Lorenzo', 'capId' => 13],
            ['nombreBarrio' => 'Parque Industrial 1', 'capId' => 13],
            ['nombreBarrio' => 'Chacras de Bruno', 'capId' => 13],
                           
        ];

        foreach ($barrios as $barrio) {
            DB::table('barrios')->insert($barrio);
        }
    }
}
