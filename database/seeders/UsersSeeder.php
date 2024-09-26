<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => '1'],
            ['email' => '1'],
            ['password' => '1'],
            ['rol' => 'Administrador'],
            
        ];

        /* foreach ($users as $user) {
            DB::table('users')->insert($user);
        } */
    }
}