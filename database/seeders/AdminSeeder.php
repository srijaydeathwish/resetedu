<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name'              => 'Admin User',
            'email'             => 'admin@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        $this->command->info('Admin user created successfully!');
    }
}
