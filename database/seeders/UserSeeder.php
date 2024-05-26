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
                "nisn" => "11111",
                "email" => "admin@sipsmea.my.id",
                "email_verified_at" => now(),
                "password" => Hash::make("glr413fv37"),
                "pwd_nohash" => "glr413fv37",
                "role" => "admin",
            ],
            [
                "name" => "Demo1",
                "nisn" => "16517",
                "email" => "demo1@sipsmea.my.id",
                "email_verified_at" => now(),
                "password" => Hash::make("hgu7lr9zSa211K0zzk"),
                "pwd_nohash" => "hgu7lr9zSa211K0zzk",
                "role" => "siswa",
            ]
        ]);
    }
}
