<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'admin',
        ]);

        $rolUser = Role::create([
            'name' => 'user',
        ]);

        // Password   z
        User::factory()->create([
            'name' => 'mikel',
            'email' => 'mikel@gmail.com',
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
        ]);

        Product::factory(10)->create();
    }
}
