<?php

namespace App\Fakers\Backend;

class DashboardFaker {

    public function summary_conversion(){
        $faker = \Faker\Factory::create();

        $ret = [
            'today' => $faker->randomFloat(2, 1000, 2000),
            'yesterday' => $faker->randomFloat(2, 1000, 9000),
            'last_7d' => $faker->randomFloat(2, 9000, 12000),
            'last_30d' => $faker->randomFloat(2, 30000, 40000),
            'this_year' => $faker->randomFloat(2, 300000, 400000),
        ];

        return $ret;
    }


    public function total_revenue(){
        $faker = \Faker\Factory::create();

        $ret = [
            '07_01' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_02' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_03' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_04' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_05' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_06' => ['total_revenue' => $faker->numberBetween(400, 900)],
            '07_07' => ['total_revenue' => $faker->numberBetween(400, 900)],
        ];

        return $ret;
    }

    public function performance(){
        $faker = \Faker\Factory::create();

        $ret = [
            '07_01' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_02' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_03' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_04' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_05' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_06' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
            '07_07' => ['clicks' => $faker->numberBetween(900, 1500), 'conversions' => $faker->numberBetween(400, 800)],
        ];

        return $ret;
    }
    
}