<?php

namespace App\Services;

use GuzzleHttp\Client;

class DarkSky {

    public function researchWeather(string $city){

        $appid = env('DARKSKY_ACCESS_KEY');

        //各都市の緯度と軽度
        $cities = array(

            "北海道" => Array
            (
                 "latitude" => 43,
                 "longitude" => 141,
            ),

           "青森" => Array
            (
                 "latitude" => 41,
                 "longitude" => 141,
            ),

           "岩手" => Array
            (
                 "latitude" => 40,
                 "longitude" => 141,
            ),

           "宮城" => Array
            (
                 "latitude" => 38,
                 "longitude" => 141,
            ),

           "秋田" => Array
            (
                 "latitude" => 40,
                 "longitude" => 140,
            ),

           "山形" => Array
            (
                 "latitude" => 38,
                 "longitude" => 140,
            ),

           "福島" => Array
            (
                 "latitude" => 38,
                 "longitude" => 140,
            ),

           "茨城" => Array
            (
                 "latitude" => 36,
                 "longitude" => 140,
            ),

           "栃木" => Array
            (
                 "latitude" => 37,
                 "longitude" => 140,
            ),

           "群馬" => Array
            (
                 "latitude" => 36,
                 "longitude" => 139,
            ),

           "埼玉" => Array
            (
                 "latitude" => 36,
                 "longitude" => 140,
            ),

           "千葉" => Array
            (
                 "latitude" => 36,
                 "longitude" => 140,
            ),

           "東京" => Array
            (
                 "latitude" => 36,
                 "longitude" => 140,
            ),

           "神奈川" => Array
            (
                 "latitude" => 35,
                 "longitude" => 140,
            ),

           "新潟" => Array
            (
                 "latitude" => 38,
                 "longitude" => 139,
            ),

           "富山" => Array
            (
                 "latitude" => 37,
                 "longitude" => 137,
            ),

           "石川" => Array
            (
                 "latitude" => 37,
                 "longitude" => 137,
            ),

           "福井" => Array
            (
                 "latitude" => 36,
                 "longitude" => 136,
            ),

           "山梨" => Array
            (
                 "latitude" => 36,
                 "longitude" => 139,
            ),

           "長野" => Array
            (
                 "latitude" => 37,
                 "longitude" => 138,
            ),

           "岐阜" => Array
            (
                 "latitude" => 35,
                 "longitude" => 137,
            ),

           "静岡" => Array
            (
                 "latitude" => 35,
                 "longitude" => 138,
            ),

           "愛知" => Array
            (
                 "latitude" => 35,
                 "longitude" => 137,
            ),

           "三重" => Array
            (
                 "latitude" => 35,
                 "longitude" => 137,
            ),

           "滋賀" => Array
            (
                 "latitude" => 35,
                 "longitude" => 136,
            ),

           "京都" => Array
            (
                 "latitude" => 35,
                 "longitude" => 136,
            ),

           "大阪" => Array
            (
                 "latitude" => 35,
                 "longitude" => 136,
            ),

           "兵庫" => Array
            (
                 "latitude" => 35,
                 "longitude" => 135,
            ),

           "奈良" => Array
            (
                 "latitude" => 35,
                 "longitude" => 136,
            ),

           "和歌山" => Array
            (
                 "latitude" => 34,
                 "longitude" => 135,
            ),

           "鳥取" => Array
            (
                 "latitude" => 36,
                 "longitude" => 134,
            ),

           "島根" => Array
            (
                 "latitude" => 35,
                 "longitude" => 133,
            ),

           "岡山" => Array
            (
                 "latitude" => 35,
                 "longitude" => 134,
            ),

           "広島" => Array
            (
                 "latitude" => 34,
                 "longitude" => 132,
            ),

           "山口" => Array
            (
                 "latitude" => 34,
                 "longitude" => 131,
            ),

           "徳島" => Array
            (
                 "latitude" => 34,
                 "longitude" => 135,
            ),

           "香川" => Array
            (
                 "latitude" => 34,
                 "longitude" => 134,
            ),

           "愛媛" => Array
            (
                 "latitude" => 34,
                 "longitude" => 133,
            ),

           "高知" => Array
            (
                 "latitude" => 34,
                 "longitude" => 134,
            ),

           "福岡" => Array
            (
                 "latitude" => 34,
                 "longitude" => 130,
            ),

           "佐賀" => Array
            (
                 "latitude" => 33,
                 "longitude" => 130,
            ),

           "長崎" => Array
            (
                 "latitude" => 33,
                 "longitude" => 130,
            ),

           "熊本" => Array
            (
                 "latitude" => 33,
                 "longitude" => 131,
            ),

           "大分" => Array
            (
                 "latitude" => 33,
                 "longitude" => 132,
            ),

           "宮崎" => Array
            (
                 "latitude" => 32,
                 "longitude" => 131,
            ),

           "鹿児島" => Array
            (
                 "latitude" => 32,
                 "longitude" => 131,
            ),

           "沖縄" => Array
            (
                 "latitude" => 26,
                 "longitude" => 128,
            ),

            "金沢" => Array
            (
                "latitude" => 36,
                "longitude" => 136,
            )

        );

        if (array_key_exists($city, $cities)) {
            $latitude = $cities[$city]['latitude'];
            $longitude = $cities[$city]['longitude'];
        } else {
            $latitude = null;
            $longitude = null;
        }

        $client = new Client();
        $response = $client
            //latitude->緯度,longitude->経度
            ->get("https://api.darksky.net/forecast/${appid}/${latitude},${longitude}?units=si&lang=ja",
                ['http_errors' => false]);

        return json_decode($response->getBody()->getContents(), true);

    }

}
