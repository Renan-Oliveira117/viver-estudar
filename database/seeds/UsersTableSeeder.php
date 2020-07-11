<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        User::firstOrCreate(
            [
                'email' => 'admin@admin.com'
            ],
            [
                'name' => 'Renan',
                'tipo' => '1',
                'password' => Hash::make('admin')
            ]
            );
    }
}
