<?php


namespace binancephpapi\Wallet;


use binancephpapi\Binance;
use binancephpapi\Config\Config;
use binancephpapi\Http\Http;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WalletEndPoints
{
    protected array $config = [
        'BASE_URL' => 'https://api.binance.com',
        'SECTION' => '/sapi',
        'VERSION' => '/v1'
    ];

    protected $url = 'https://api.binance.com/sapi/v1/capital/config/getall';
    protected Http $http;

    public function __construct(string $publicKey, string $secretKey, Http $http){
        $this->http = $http;
    }


    public function getAllCoins(array $queryParams = []){

        return $this->walletQueryBuilder($queryParams);

    }

    private function walletQueryBuilder(array $queryParams){
        $query = Http::binanceQueryBuilder($queryParams);

        try {
            $request = $this->http->make()->request('GET', $this->url,
                [
                    'headers' => [
                        'X-MBX-APIKEY' => Config::$publicKey,
                        'Accept' => 'application/json',
                    ],
                    'query' => ['timestamp' => $query['BinanceServerTime'], 'signature' => $query['signature']]
                ]);


        } catch (GuzzleException $e) {

            return $e->getMessage();
        }
        return $request->getBody()->getContents();
    }

    public function getDailyAccountSnapShot(){
        return new AccountSnapShot\AccountSnapShot($this->http);
    }





}

