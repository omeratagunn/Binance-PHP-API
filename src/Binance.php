<?php


namespace binancephpapi;


use binancephpapi\Config\Config;
use binancephpapi\Config\Constants;
use binancephpapi\Http\Query;
use binancephpapi\SubAccountEp\SubAccountEndPoints;
use binancephpapi\Wallet\WalletEndPoints;
use GuzzleHttp\Exception\GuzzleException;

class Binance
{
    protected object $http; // guzzle as default //
    private string $url;
    protected array $config = [
        'BASE_URL' => 'https://api.binance.com',
        'SECTION' => '/sapi',
        'VERSION' => '/v1'
    ];

    public function __construct(string $publicKey, string $secretKey, array $config = []){
        $this->url = Constants::$url.'/sapi/v1';
        $this->http = new Http\Http();
        Config::$publicKey = $publicKey;
        Config::$secretKey = $secretKey;

    }

    public function subAccount(){
        return new SubAccountEndPoints();
    }

    public function wallet(){
        return new WalletEndPoints($this->http);
    }

    public function systemStatus(){
        return Query::queryApi('GET', [], $this->url.'/system/status', $this->http);
    }



}
