<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name'  => 'admin',
            'email'  => 'admin@gmail.com',
            'jenis_kelamin'  => 'laki-laki',
            'password'  => bcrypt("developer"),
            'alamat'  => 'Indramayu',
            'no_hp'  => '0813334445',
            'id_role' => '1'

        ]);
        User::create([

            'name'  => 'petugas',
            'email'  => 'petugas@gmail.com',
            'jenis_kelamin'  => 'laki-laki',
            'password'  => bcrypt("developer"),
            'alamat'  => 'Indramayu',
            'no_hp'  => '0813334645',
            'id_role' => '2'

        ]);
        User::create([

            'name'  => 'pemimpin',
            'email'  => 'pemimpin@gmail.com',
            'jenis_kelamin'  => 'laki-laki',
            'password'  => bcrypt("developer"),
            'alamat'  => 'Indramayu',
            'no_hp'  => '0813344645',
            'id_role' => '3'

        ]);
    }
}
