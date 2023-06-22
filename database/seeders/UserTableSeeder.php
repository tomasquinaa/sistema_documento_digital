<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Armando Quinanga',
            'email' => 'armando@teste.com',
            'password' => bcrypt('12345678'),
            'grupo_id' => '1'
        ]);
    }
}
