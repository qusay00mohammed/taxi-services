<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $cities = [
            [
                "name" => "Albany",
                "price" => 990.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Albion",
                "price" => 165.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Angola",
                "price" => 115.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Arcade",
                "price" => 160.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Attica",
                "price" => 110.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Alfred",
                "price" => 345.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Arkwright",
                "price" => 195.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Aubum",
                "price" => 425.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Avon",
                "price" => 215.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Barker",
                "price" => 135.00,
                "regStatus" => 1,
            ],

            [
                "name" => "Batavia",
                "price" => 120.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Binghamton",
                "price" => 775.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Brant",
                "price" => 125.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Brockport",
                "price" => 210.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Brockton",
                "price" => 215.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Canandaigua",
                "price" => 310.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Cassadaga",
                "price" => 210.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Chautauqua",
                "price" => 285.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Chaffee",
                "price" => 125.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Colden",
                "price" => 105.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Corning",
                "price" => 475.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Cortland",
                "price" => 580.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Delevan",
                "price" => 165.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Dunkirk",
                "price" => 185.00,
                "regStatus" => 1,
            ],
            [
                "name" => "East Concord",
                "price" => 130.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Elba",
                "price" => 130.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Eilicottville",
                "price" => 195.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Elimira",
                "price" => 525.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Fairport",
                "price" => 275.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Farnham",
                "price" => 130.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Franklinville",
                "price" => 210.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Fredoria",
                "price" => 185.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Gasport",
                "price" => 110.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Geneseo",
                "price" => 215.00,
                "regStatus" => 1,
            ],
            [
                "name" => "Glenwood",
                "price" => 115.00,
                "regStatus" => 1,
            ]
        ];

        foreach ($cities as $key => $value) {
            City::create($value);
        }

    }
}
