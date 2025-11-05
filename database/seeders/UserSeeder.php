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
            ['name' => 'Han Inno', 'email' => 'inno@email.com', 'password' => bcrypt('password')],
        ];

        User::create($default);

        if (User::count() < 5) {
            User::factory()->count(5 - User::count())->create();
        }
    }
}
