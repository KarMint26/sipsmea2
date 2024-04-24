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
        /**
         * "name" => "Febri Fiana",
         * "username" => "16517",
         * "password" => bcrypt("hgu7lr9z"),
         * "role" => "siswa",
         */
        // User::create([
        //     [
                // "name" => "admin",
                // "username" => "admin",
                // "password" => bcrypt("glr413fv37"),
                // "role" => "admin",
        //     ],
        //     [
        //         "name" => "Febri Fiana",
        //         "username" => "16517",
        //         "password" => bcrypt("hgu7lr9z"),
        //         "role" => "siswa",
        //     ]
        // ]);

        User::insert([
            [
                "name" => "admin",
                "username" => "admin",
                "password" => Hash::make("glr413fv37"),
                "pwd_nohash" => "glr413fv37",
                "role" => "admin",
            ],
            [
                "name" => "Demo5",
                "username" => "16517",
                "password" => Hash::make("hgu7lr9z"),
                "pwd_nohash" => "hgu7lr9z",
                "role" => "siswa",
            ]
        ]);
    }
}
