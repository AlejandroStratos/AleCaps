<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caps = [
            ['capId' => 1],
            ['capId' => 2],
            ['capId' => 3],
            ['capId' => 4],
            ['capId' => 5],
            ['capId' => 6],
            ['capId' => 8],
            ['capId' => 9],
            ['capId' => 11],
            ['capId' => 12],
            ['capId' => 13],
        ];

        foreach ($caps as $cap) {
            DB::table('caps')->insert($cap);
        }
    }
}