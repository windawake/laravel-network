<?php

namespace App\Fakers;

class MatchFaker {
    public function getFrontendSearch(){
        $request = request();
        $field = $request->post('field');

        if($field)

        $ret = [
            'offer_category'=>[
                1 => 'Casino & Crypto',
                2 => 'Diet',
                3 => 'Sweepstakes',
                4 => 'ED/Muscle',
                5 => 'Skin',
                6 => 'Other',
            ],
            'offer_status'=>[ 
                1 =>'paid',
                0 =>'pending',
            ],
            'country' => [
                1 => 'USA',
                2 => 'china',
                3 => 'japan',
                4 => 'france',
                5 => 'England',
            ],
            'time_zone' => [
                1 => 'UTC +0',
                2 => 'UTC +1',
                3 => 'UTC +2',
                4 => 'UTC +3',
                5 => 'UTC +4',
                6 => 'UTC +5',
                7 => 'UTC +6',
                8 => 'UTC +7',
                9 => 'UTC +8',
                10 => 'UTC +9',
                11 => 'UTC -5'

            ],
            'billing_type' => [
                1 => 'revenue',
                2 => 'repeat order bonus',
                3 => 'bonus',
            ],
            'billing_status' => [
                1 =>'paid',
                0 =>'pending',
            ],
            'bonus_type' => [
                1 => 'Bonus',
                2 => 'Repeat Order',
            ],
            'bonus_status' => [
                1 =>'paid',
                0 =>'pending',
            ],
            'post_back_type' => [
                2 =>'iFrame Code',
                1 =>'Postback URL',
                0 =>'global_flag',
            ],
            'post_back_goal' => [
                1 =>'Lead',
                2 =>'Confirmed',
            ],
            'global_flag' => [
                1 => '是',
                0 => '否',
            ]
        ];

        return $ret;
    }


}