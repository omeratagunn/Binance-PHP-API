<?php


namespace binancephpapi;


use binancephpapi\Config\Config;
use binancephpapi\Config\Constants;
use binancephpapi\Http\Query;
use binancephpapi\Market\MarketEndPoints;
use binancephpapi\SubAccountEp\SubAccountEndPoints;
use binancephpapi\Wallet\WalletEndPoints;
use GuzzleHttp\Exception\GuzzleException;

class Binance
{
    protected object $http; // guzzle as default //
    private string $url;

    public function __construct(string $publicKey, string $secretKey){
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

    public function market(){
        return new MarketEndPoints($this->http);
    }

    public function systemStatus(){
        return Query::queryApi('GET', [], $this->url.'/system/status', $this->http);
    }



}
