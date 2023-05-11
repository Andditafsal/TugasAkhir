<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin role
        Role::create([
            'name' => 'Admin'
        ]);

        // Create Petugas role
        Role::create([
            'name' => 'Petugas'
        ]);
        //Create Pemimpin
        Role::create([
            'name' => 'Pemimpin'
        ]);
        // Create Petugas Guru
        Role::create([
            'name' => 'Guru'
        ]);
        //Create Siswa
        Role::create([
            'name' => 'Siswa'
        ]);
    }
}
