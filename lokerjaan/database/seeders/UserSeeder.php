<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Anas Muflih',
            'username' => 'Nash',
            'email' => 'anasmuflih@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::factory(3)->create();
    }
}