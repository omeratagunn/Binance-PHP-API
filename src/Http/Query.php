<?php


namespace binancephpapi\Http;


use binancephpapi\Config\Config;
use GuzzleHttp\Exception\GuzzleException;

class Query
{

    public static function queryApi(string $getpost, array $queryParams, $url, Http $http){
        // Query builder creates signature from all params requested and returns timestamp and signature //
        $buildSignature = Http::binanceQueryBuilder($queryParams);
        $query = [];

        foreach ($queryParams as $key => $value){
                $query[$key] = $value;
        }
        // signature must be at the end //
        $query['timestamp'] = $buildSignature['BinanceServerTime'];
        $query['signature'] = $buildSignature['signature'];
        try {
            $request = $http->make()->request($getpost, $url,
                [
                    'headers' => [
                        'X-MBX-APIKEY' => Config::$publicKey,
                        'Accept' => 'application/json',
                    ],
                    'query' => $query,
                ]);


        } catch (GuzzleException $e) {

            return $e->getMessage();
        }
        return $request->getBody()->getContents();
    }

    public static function QueryWithoutAuthorization(string $getpost, string $url, Http $http, array $params = []){

        try {
            $request = $http->make()->request($getpost, $url,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'query' => http_build_query($params),
                ]);


        } catch (GuzzleException $e) {

            return $e->getMessage();
        }
        return $request->getBody()->getContents();
    }

}
