<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'Administator',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'level' => 'donor',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'level' => 'recipient',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'level' => 'donor',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@gmail.com',
                'level' => 'recipient',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@gmail.com',
                'level' => 'donor',
                'password' => 'qwerty123',
            ],
            [
                'name' => 'User 6',
                'email' => 'user6@gmail.com',
                'level' => 'recipient',
                'password' => 'qwerty123',
            ],
        ]);
    }
}
