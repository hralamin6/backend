<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $this->call(RolesAndPermissionsSeeder::class);
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('User');

        Product::factory(10)->create();
    }
}
