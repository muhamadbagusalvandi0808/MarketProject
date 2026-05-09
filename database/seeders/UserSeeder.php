<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=> 'Admin@Gmail.com',
            'password'=> Hash::make('admin123'),
            'role'=> 'admin',
        ]);
        User::create([
            'name'=>'Customer',
            'email'=> 'Cust@Gmail.com',
            'password'=> Hash::make('cust123'),
            'role'=> 'customer',
        ]);

        User::create([
            'name'=>'Yazid',
            'email'=> 'Yazid@Gmail.com',
            'password'=> Hash::make('yazid123'),
            'role'=> 'customer',
        ]);
    }
}
