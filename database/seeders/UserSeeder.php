<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // users data
        $users = [
            [
                'name' => 'Karem',
                'email' => 'karem@gmail.com',
                'role' => 'user',
                'password' => \Hash::make('123456789'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => \Hash::make('123456789'),
            ],
        ];
        // insert seeder
        foreach ($users as $user) {
            User::updateOrCreate($user);
        }
    }
}
