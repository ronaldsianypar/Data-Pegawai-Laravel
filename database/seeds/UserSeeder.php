<?php

use Illuminate\Database\Seeder;
use App\User;
// Karna kita menggunakan Str dari laravel, kita harus import dulu
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
        	'name' => 'Admin Aplikasi',
        	'level' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin'),
        	'remember_token' => Str::random(60),
        ]);
    }
}
