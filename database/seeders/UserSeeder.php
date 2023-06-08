<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->delete();
        User::create([
            "username" => "Osama",
            "email" => "osama@gmail.com",
            "fullname" => "Osama Alkistani",
            "password" => Hash::make("Osama"),
            "regStatus" => 1,
        ]);
    }
}
