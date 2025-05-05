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
        $superadmin = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'password' => Hash::make('123123123'),
        ]);
        $superadmin->assignRole('superadmin');

        // $admin = User::create([
        //     'name' => 'Admin User',
        //     'username' => 'admin',
        //     'password' => Hash::make('123123123'),
        // ]);
        // $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Regular User',
            'username' => 'user',
            'password' => Hash::make('123123123'),
        ]);
        $user->assignRole('user');
    }
}
