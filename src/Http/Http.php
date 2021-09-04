<?php


namespace binancephpapi\Http;


use binancephpapi\Config\Config;
use GuzzleHttp\Client;

class Http
{

    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function make()
    {

        return $this->client;

    }

    protected static function buildSignature(array $params, int $binanceServerTime){
            // get binance server time //

            // add into query params //
            $params['timestamp'] = $binanceServerTime;
            // sign and return //
            return $signature = hash_hmac('SHA256',http_build_query($params) ,Config::$secretKey);

    }

    protected static function BinanceServerTime(){
        $client = (new Client())->request('GET','https://api.binance.com/api/v3/time')->getBody()->getContents();
        return json_decode($client,true)['serverTime'];
    }

    public static function binanceQueryBuilder(array $params){

        $binanceServerTime = self::BinanceServerTime();
        $signature = self::buildSignature($params, $binanceServerTime);

        return ['BinanceServerTime'=>$binanceServerTime, 'signature' => $signature, 'Params' => $params];
    }



}


