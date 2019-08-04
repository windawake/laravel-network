<?php

namespace App\Fakers;

class MatchFaker {
    public function getFrontendSearch(){
        $faker = \Faker\Factory::create();

        $request = request();
        $field = $request->post('field');
        $value = $request->post('value');
        $ret = [];

        // 模糊查询offer
        if($field == 'offer'){
            $ret = [
                ['offer_id' => 1, 'offer_name' => $faker->name],
                ['offer_id' => 2, 'offer_name' => $faker->name],
                ['offer_id' => 3, 'offer_name' => $faker->name],
                ['offer_id' => 4, 'offer_name' => $faker->name],
                ['offer_id' => 5, 'offer_name' => $faker->name],
                ['offer_id' => 6, 'offer_name' => $faker->name],
            ];
            $intval = intval($value);
            if($intval){
                if($intval > 0 && $intval < 7){
                    $ret = [
                        ['offer_id'=>$value, 'offer_name' => $faker->name]
                    ];
                }else{
                    $ret = [];
                }
            }
            
        }

        // 模糊查询bonus
        if($field == 'bonus'){
            $ret = [
                ['bonus_id' => 1, 'bonus_name' => $faker->name],
                ['bonus_id' => 2, 'bonus_name' => $faker->name],
                ['bonus_id' => 3, 'bonus_name' => $faker->name],
                ['bonus_id' => 4, 'bonus_name' => $faker->name],
                ['bonus_id' => 5, 'bonus_name' => $faker->name],
                ['bonus_id' => 6, 'bonus_name' => $faker->name],
            ];
            $intval = intval($value);
            if($intval){
                if($intval > 0 && $intval < 7){
                    $ret = [
                        ['bonus_id'=>$value, 'bonus_name' => $faker->name]
                    ];
                }else{
                    $ret = [];
                }
            }
            
        }

        return $ret;
    }

    public function getBackendSearch(){
        $faker = \Faker\Factory::create();

        $request = request();
        $field = $request->post('field');
        $value = $request->post('value');
        $ret = [];

        // 模糊查询offer
        if($field == 'offer'){
            $ret = [
                ['offer_id' => 1, 'offer_name' => $faker->name],
                ['offer_id' => 2, 'offer_name' => $faker->name],
                ['offer_id' => 3, 'offer_name' => $faker->name],
                ['offer_id' => 4, 'offer_name' => $faker->name],
                ['offer_id' => 5, 'offer_name' => $faker->name],
                ['offer_id' => 6, 'offer_name' => $faker->name],
            ];
            $intval = intval($value);
            if($intval){
                if($intval > 0 && $intval < 7){
                    $ret = [
                        ['offer_id'=>$value, 'offer_name' => $faker->name]
                    ];
                }else{
                    $ret = [];
                }
            }
            
        }

        // 模糊查询bonus
        if($field == 'bonus'){
            $ret = [
                ['bonus_id' => 1, 'bonus_name' => $faker->name],
                ['bonus_id' => 2, 'bonus_name' => $faker->name],
                ['bonus_id' => 3, 'bonus_name' => $faker->name],
                ['bonus_id' => 4, 'bonus_name' => $faker->name],
                ['bonus_id' => 5, 'bonus_name' => $faker->name],
                ['bonus_id' => 6, 'bonus_name' => $faker->name],
            ];
            $intval = intval($value);
            if($intval){
                if($intval > 0 && $intval < 7){
                    $ret = [
                        ['bonus_id'=>$value, 'bonus_name' => $faker->name]
                    ];
                }else{
                    $ret = [];
                }
            }
            
        }

        return $ret;
    }


}