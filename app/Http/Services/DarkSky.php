<?php

namespace App\Services;

use GuzzleHttp\Client;

class DarkSky {

    public function researchWeather(string $city){

        $appid = env('DARKSKY_ACCESS_KEY');

        //各都市の緯度と軽度
        $cities = array(

            "東京" => Array
            (
                 "latitude" => 36,
                 "longitude" => 140,
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
