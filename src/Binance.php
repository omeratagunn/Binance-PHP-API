<?php


namespace binancephpapi;


use binancephpapi\Config\Config;
use binancephpapi\SubAccountEp\SubAccountEndPoints;
use binancephpapi\Wallet\WalletEndPoints;
use GuzzleHttp\Exception\GuzzleException;

class Binance
{
    protected object $http; // guzzle as default //
    protected array $config = [
        'BASE_URL' => 'https://api.binance.com',
        'SECTION' => '/sapi',
        'VERSION' => '/v1'
    ];



    public function __construct(string $publicKey, string $secretKey, array $config = []){

        $this->http = new Http\Http();
        Config::$publicKey = $publicKey;
        Config::$secretKey = $secretKey;

    }

    public function subAccount(){
        return new SubAccountEndPoints();
    }

    public function wallet(){
        return new WalletEndPoints(Config::$publicKey, Config::$secretKey, $this->http);
    }

    public function systemStatus(){
        try {
            $request = $this->http->make()->request('GET', $this->config['BASE_URL'].$this->config['SECTION'].$this->config['VERSION'].'/system/status',
                [
                    'headers' => [
                        'X-MBX-APIKEY' => Config::$publicKey,
                        'Accept' => 'application/json',
                    ]
                ]);
        } catch (GuzzleException $e) {
            return $e->getCode();
        }
        return $request->getBody()->getContents();
    }



}
