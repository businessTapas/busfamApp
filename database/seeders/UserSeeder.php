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
     *
     * @return void
     */
    public function run()
    {
        $users =
            [
                [
                    'name' => "Admin",
                    'email' => "admin@templete.com",
                    'password' => Hash::make("admin@1234"),
                    'type' => "1",   // Admin


                ]


            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
