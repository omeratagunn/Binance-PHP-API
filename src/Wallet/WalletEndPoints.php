<?php


namespace binancephpapi\Wallet;


use binancephpapi\Binance;
use binancephpapi\Config\Config;
use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;
use binancephpapi\Wallet\EventHistory\DepositHistory;
use binancephpapi\Wallet\EventHistory\WithDrawHistory;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WalletEndPoints
{

    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/sapi/v1/capital/config/getall';
        $this->http = $http;
    }


    public function getAllCoins(array $queryParams = []){

        return Query::queryApi($this->method, $queryParams, $this->url, $this->http);

    }

    public function getDailyAccountSnapShot(){
        return new AccountSnapShot\AccountSnapShot($this->http);
    }

    public function fastWithDrawSwitch(){
        return new FastWithDrawSwitch\FastWithDrawSwitch($this->http);
    }

    public function depositHistory(){
        return new DepositHistory($this->http);
    }

    public function withDrawHistory(){
        return new WithDrawHistory($this->http);
    }







}

