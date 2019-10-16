<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    const PREFECTURES_LIST = [
        "北海道" => [
            "latitude" => 43.06417,
            "longitude" => 141.34694,
        ],
        "青森" => [
            "latitude" => 40.82444,
            "longitude" => 140.74,
        ],
        "岩手" => [
            "latitude" => 39.70361,
            "longitude" => 141.1525,
        ],
        "宮城" => [
            "latitude" => 38.26889,
            "longitude" => 140.87194,
        ],
        "秋田" => [
            "latitude" => 39.71861,
            "longitude" => 140.1025,
        ],
        "山形" => [
            "latitude" => 38.24056,
            "longitude" => 140.36333,
        ],
        "福島" => [
            "latitude" => 37.75,
            "longitude" => 140.46778,
        ],
        "茨城" => [
            "latitude" => 36.34139,
            "longitude" => 140.44667,
        ],
        "栃木" => [
            "latitude" => 36.56583,
            "longitude" => 139.88361,
        ],
        "群馬" => [
            "latitude" => 36.39111,
            "longitude" => 139.06083,
        ],
        "埼玉" => [
            "latitude" => 35.85694,
            "longitude" => 139.64889,
        ],
        "千葉" => [
            "latitude" => 35.60472,
            "longitude" => 140.12333,
        ],
        "東京" => [
            "latitude" => 35.68944,
            "longitude" => 139.69167,
        ],
        "神奈川" => [
            "latitude" => 35.44778,
            "longitude" => 139.6425,
        ],
        "新潟" => [
            "latitude" => 37.90222,
            "longitude" => 139.02361,
        ],
        "富山" => [
            "latitude" => 36.69528,
            "longitude" => 137.21139,
        ],
        "石川" => [
            "latitude" => 36.59444,
            "longitude" => 136.62556,
        ],
        "福井" => [
            "latitude" => 36.06528,
            "longitude" => 136.22194,
        ],
        "山梨" => [
            "latitude" => 35.66389,
            "longitude" => 138.56833,
        ],
        "長野" => [
            "latitude" => 36.65139,
            "longitude" => 138.18111,
        ],
        "岐阜" => [
            "latitude" => 35.39111,
            "longitude" => 136.72222,
        ],
        "静岡" => [
            "latitude" => 34.97694,
            "longitude" => 138.38306,
        ],
        "愛知" => [
            "latitude" => 35.18028,
            "longitude" => 136.90667,
        ],
        "三重" => [
            "latitude" => 34.73028,
            "longitude" => 136.50861,
        ],
        "滋賀" => [
            "latitude" => 35.00444,
            "longitude" => 135.86833,
        ],
        "京都" => [
            "latitude" => 35.02139,
            "longitude" => 135.75556,
        ],
        "大阪" => [
            "latitude" => 34.68639,
            "longitude" => 135.52,
        ],
        "兵庫" => [
            "latitude" => 34.69139,
            "longitude" => 135.18306,
        ],
        "奈良" => [
            "latitude" => 34.68528,
            "longitude" => 135.83278,
        ],
        "和歌山" => [
            "latitude" => 34.22611,
            "longitude" => 135.1675,
        ],
        "鳥取" => [
            "latitude" => 35.50361,
            "longitude" => 134.23833,
        ],
        "島根" => [
            "latitude" => 35.47222,
            "longitude" => 133.05056,
        ],
        "岡山" => [
            "latitude" => 34.66167,
            "longitude" => 133.935,
        ],
        "広島" => [
            "latitude" => 34.39639,
            "longitude" => 132.45944,
        ],
        "山口" => [
            "latitude" => 34.18583,
            "longitude" => 131.47139,
        ],
        "徳島" => [
            "latitude" => 34.06583,
            "longitude" => 134.55944,
        ],
        "香川" => [
            "latitude" => 34.34028,
            "longitude" => 134.04333,
        ],
        "愛媛" => [
            "latitude" => 33.84167,
            "longitude" => 132.76611,
        ],
        "高知" => [
            "latitude" => 33.55972,
            "longitude" => 133.53111,
        ],
        "福岡" => [
            "latitude" => 33.60639,
            "longitude" => 130.41806,
        ],
        "佐賀" => [
            "latitude" => 33.24944,
            "longitude" => 130.29889,
        ],
        "長崎" => [
            "latitude" => 32.74472,
            "longitude" => 129.87361,
        ],
        "熊本" => [
            "latitude" => 32.78972,
            "longitude" => 130.74167,
        ],
        "大分" => [
            "latitude" => 33.23806,
            "longitude" => 131.6125,
        ],
        "宮崎" => [
            "latitude" => 31.91111,
            "longitude" => 131.42389,
        ],
        "鹿児島" => [
            "latitude" => 31.56028,
            "longitude" => 130.55806,
        ],
        "沖縄" => [
            "latitude" => 26.2125,
            "longitude" => 127.68111,
        ],
        "金沢" => [
            "latitude" => 36,
            "longitude" => 136,
        ]
    ];
}
