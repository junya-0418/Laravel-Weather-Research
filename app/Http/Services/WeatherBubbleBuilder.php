<?php

namespace App\Services;

use Illuminate\Support\Arr;

use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder;

class WeatherBubbleBuilder implements ContainerBuilder {

    private $day_data;
    private $week_data;
    private $icon;
    private $summary;
    private $temperatureMin;
    private $temperatureMax;
    private $imageurl;

    public static function builder(): WeatherBubbleBuilder {

        return new self();

    }

    public function setContents(array $weather): void
    {

        //天気によって画像を変える
        $weather_patterns = array(

            "clear-day" => "https://icon-rainbow.com/i/icon_00702/icon_007025_256.png",
            "partly-cloudy-day" => "https://icon-rainbow.com/i/icon_00722/icon_007220_256.png",
            "cloudy" => "https://icon-rainbow.com/i/icon_00706/icon_007060_256.png",
            "rain" => "https://icon-rainbow.com/i/icon_00891/icon_008910_256.png",
            "snow" => "https://icon-rainbow.com/i/icon_02855/icon_028550_256.png",

        );

        //UNIX TIMEを日時に変換する
        $timestamp = $weather['time'];
        $this->day_data = date("m/d", $timestamp);
        //曜日が0から6で出力される
        $w = date("w", $timestamp);
        //曜日を日本語表示にする
        $week = ["日","月","火","水","木","金","土"];
        $this->week_data = $week[$w];

        $this->icon = Arr::get($weather, 'icon', null);

        $this->summary = Arr::get($weather, 'summary', null);

        //天気の情報があれば画像表示なければはてなマークの画像表示
        if (array_key_exists($this->icon, $weather_patterns,)) {
            $this->imageurl = $weather_patterns[$this->icon];
        } else {
            $this->imageurl = "https://icon-rainbow.com/i/icon_00202/icon_002020_256.png";
        }

        //最低気温
        $this->temperatureMin = round(Arr::get($weather, 'temperatureMin'));
        //最高気温
        $this->temperatureMax = round(Arr::get($weather, 'temperatureMax'));



    }

    public function build(): array
    {

        $array = [

            "type" => "bubble",
            "size" => "micro",
            "hero" => [
                "type" => "image",
                "url" => $this->imageurl,
                "size" => "sm",
                "aspectMode" => "cover",
                "aspectRatio" => "320:320"
            ],
            "body" => [
                "type" => "box",
                "layout" => "vertical",
                "contents" => [
                    [
                        "type" => "text",
                        "text" => $this->day_data . " " . $this->week_data,
                        "weight" => "bold",
                        "size" => "sm",
                        "wrap" => true
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => $this->icon,
                                "size" => "xs",
                                "margin" => "md",
                                "flex" => 0
                            ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "最高気温",
                                "size" => "xxs",
                                "color" => "#8c8c8c",
                                "margin" => "md",
                                "flex" => 0
                            ],
                            [
                                "type" => "text",
                                "text" => strval($this->temperatureMax),
//                                "text" => "最高気温",
                                "size" => "xs",
                                "margin" => "md",
                                "flex" => 0
                            ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "最低気温",
                                "size" => "xxs",
                                "color" => "#8c8c8c",
                                "margin" => "md",
                                "flex" => 0
                            ],
                            [
                                "type" => "text",
                                "text" => strval($this->temperatureMin),
//                                "text" => "最低気温",
                                "size" => "xs",
                                "margin" => "md",
                                "flex" => 0
                            ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "vertical",
                        "contents" => [
                            [
                                "type" => "box",
                                "layout" => "baseline",
                                "spacing" => "sm",
                                "contents" => [
                                    [
                                        "type" => "text",
                                        "text" => $this->summary,
                                        "wrap" => true,
                                        "size" => "xs",
                                        "flex" => 5
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                "spacing" => "sm",
                "paddingAll" => "13px"
            ]


        ];

        return $array;

    }
}
