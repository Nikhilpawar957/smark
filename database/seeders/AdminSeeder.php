<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin@123#'),
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'role' => 0,
            'status' => 1,
        ]);
    }
}
