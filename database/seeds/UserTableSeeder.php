<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The users table is initialized with a first user. For security reasons, don't forget to change these values!
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('admin'),
            'level' => 2, // manager
            'verification_token' => null,
        ];

        App\User::create($user);
    }
}