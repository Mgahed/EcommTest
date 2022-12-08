<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->make([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ])->assignRole('admin')->save();

        User::factory()->make([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ])->assignRole('client')->save();

        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('client');
        });
    }
}
