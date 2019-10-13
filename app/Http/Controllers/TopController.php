<?php

namespace App\Http\Controllers;

use App\Services\DarkSky;
use App\Services\WeatherBubbleBuilder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;

class TopController extends Controller
{
    public function index() {

        return view('hello');

    }

    public function research(Request $request) {

        Log::debug($request->header());
        Log::debug($request->input());

        $httpclient = new CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        $linebot = new LINEBot($httpclient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);

        $signature = $request->header('x-line-signature');
        if (!$linebot->validateSignature($request->getContent(), $signature)) {
            abort(400, 'Invalid signature');
        }

        $events = $linebot->parseEventRequest($request->getContent(),  $signature);
        Log::debug($events);

        foreach ($events as $event) {
            if (!($event instanceof Textmessage)) {
                Log::debug('Non text message has come');
                continue;
            }

            //Serviceクラスのインスタンスを生成してメソッドを呼び出す
            $weather = new DarkSky();
            $weatherResponse = $weather->researchWeather($event->getText());

            //都市が見つからなかった時用のLineのレスポンス
            if (array_key_exists('error', $weatherResponse)) {
                $replyText = "都市が見つかりません";
                $replyToken = $event->getReplyToken();
                $linebot->replyText($replyToken, $replyText);
                continue;
            }

            $bubbles = [];
            for ($i = 0; $i <= 6; $i++) {

                $weather = $weatherResponse['daily']['data'][$i];

                $bubble = WeatherBubbleBuilder::builder();
                $bubble->setContents($weather);
                $bubbles[] = $bubble;
            }

//            Log::debug($bubbles);

            $carousel = CarouselContainerBuilder::builder();
            $carousel->setContents($bubbles);

            $flex = FlexMessageBuilder::builder();
            $flex->setAltText('WeatherAPI');
            $flex->setContents($carousel);

//            Log::debug($flex);

            $replyToken = $event->getReplyToken();
            $linebot->replyMessage($replyToken, $flex);
        }

    }
}
