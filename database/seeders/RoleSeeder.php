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

        Role::create([
            'name' => 'Admin'
        ]);


        Role::create([
            'name' => 'Petugas'
        ]);

        Role::create([
            'name' => 'Pemimpin'
        ]);

        Role::create([
            'name' => 'Wakasek'
        ]);

        Role::create([
            'name' => 'Guru'
        ]);
    }
}
