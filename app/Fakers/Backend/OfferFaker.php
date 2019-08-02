<?php

namespace App\Fakers\Backend;

class OfferFaker {
    public function getList(){
        $faker = Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 10; $i++) {
            $info = [
                'id' => $faker->randomDigit,
                'name' => $faker->name,
                'offer_code' => $faker->name,
                'category' => $faker->randomElement([1,2,3,4,5,6]),
                'description' => $faker->sentence(),
                'payout' => $faker->randomFloat,
                'status' => $faker->randomElement([0,1]),
                'expired_time' => $faker->date(),
                'create_time' => $faker->date(),
                'update_time' => $faker->date(),
                'creator' => $faker->name,
                'modifier' => $faker->name,
            ];
            $list[] = $info;
        }
        
        $ret = [
            'list' => $list,
            'map' => [
                'offer_status'=>[
                    0=>'pending',
                    1=>'paid'
                ],
                'offer_category'=>[
                    1 => 'Casino & Crypto',
                    2 => 'Diet',
                    3 => 'Sweepstakes',
                    4 => 'ED/Muscle',
                    5 => 'Skin',
                    6 => 'Other',
                ]
            ]
        ];

        return $ret;
    }


}