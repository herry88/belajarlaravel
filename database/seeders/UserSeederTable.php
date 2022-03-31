<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data users
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@seeder.com',
                'password' => Hash::make('passwordadmin'),
                'level' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@seeder.com',
                'password' => Hash::make('passwordkasir'),
                'level' => 'kasir',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
