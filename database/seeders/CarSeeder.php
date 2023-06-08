<?php

namespace Database\Seeders;

use App\Models\Taxi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxis')->delete();
        Taxi::create([
            "vehicleType" => "Sedan",
            "numOfPeople" => "3",
            "price" => "3.3",
            "regStatus" => 1,
        ]);
        Taxi::create([
            "vehicleType" => "Van",
            "numOfPeople" => "10",
            "price" => "3.3",
            "regStatus" => 1,
        ]);
        Taxi::create([
            "vehicleType" => "Suv",
            "numOfPeople" => "4",
            "price" => "3.3",
            "regStatus" => 1,
        ]);
    }
}
