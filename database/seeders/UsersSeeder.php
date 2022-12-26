<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "User 2",
                'email' => "user2@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 3",
                'email' => "user3@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 4",
                'email' => "user4@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 5",
                'email' => "user5@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 6",
                'email' => "user6@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 7",
                'email' => "user7@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 8",
                'email' => "user8@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 9",
                'email' => "user9@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 10",
                'email' => "user10@gmail.com",
                'password' => Hash::make('password'),
            ],
            [
                'name' => "User 11",
                'email' => "user11@gmail.com",
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
