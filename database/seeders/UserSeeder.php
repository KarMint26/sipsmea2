<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        //         "name" => "admin",
        //         "username" => "admin",
        //         "password" => bcrypt("glr413fv37"),
        //         "role" => "admin",
        //     ],
        //     [
        //         "name" => "Febri Fiana",
        //         "username" => "16517",
        //         "password" => bcrypt("hgu7lr9z"),
        //         "role" => "siswa",
        //     ]
        // ]);

        User::create([
            "name" => "Febri Fiana",
            "username" => "16517",
            "password" => bcrypt("hgu7lr9z"),
            "role" => "siswa",
        ]);
    }
}
