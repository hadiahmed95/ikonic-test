<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friend_requests')->insert([
            [
                "sender_id" => 1,
                "receiver_id" => 2,
                "accepted" => 0
            ],
            [
                "sender_id" => 1,
                "receiver_id" => 3,
                "accepted" => 0
            ],
            [
                "sender_id" => 2,
                "receiver_id" => 1,
                "accepted" => 0
            ],
            [
                "sender_id" => 4,
                "receiver_id" => 1,
                "accepted" => 0
            ],
            [
                "sender_id" => 1,
                "receiver_id" => 5,
                "accepted" => 0
            ],
            [
                "sender_id" => 5,
                "receiver_id" => 2,
                "accepted" => 0
            ],
            [
                "sender_id" => 6,
                "receiver_id" => 1,
                "accepted" => 0
            ],
            [
                "sender_id" => 7,
                "receiver_id" => 1,
                "accepted" => 0
            ],
            [
                "sender_id" => 1,
                "receiver_id" => 7,
                "accepted" => 0
            ],
            [
                "sender_id" => 1,
                "receiver_id" => 8,
                "accepted" => 0
            ]
        ]);
    }
}
