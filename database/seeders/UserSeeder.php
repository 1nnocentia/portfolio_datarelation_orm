<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default = [
            ['name' => 'Han Inno', 'email' => 'inno@example.com', 'password' => bcrypt('password')],
        ];

        User::create([
            'name' => $default[0]['name'],
            'email' => $default[0]['email'],
            'password' => $default[0]['password'],
        ]);

        if (User::count() < 5) {
            User::factory()->count(5 - User::count())->create();
        }
    }
}
