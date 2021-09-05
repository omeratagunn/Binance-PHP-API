<?php


namespace binancephpapi\Wallet;


use binancephpapi\Binance;
use binancephpapi\Config\Config;
use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;
use binancephpapi\Wallet\AccountApiTradingStatus\AccountApiTradingStatus;
use binancephpapi\Wallet\AssetDetail\AssetDetail;
use binancephpapi\Wallet\DustLog\DustLog;
use binancephpapi\Wallet\EventHistory\DepositHistory;
use binancephpapi\Wallet\EventHistory\FiatDepositHistory;
use binancephpapi\Wallet\EventHistory\FiatPaymentsHistory;
use binancephpapi\Wallet\EventHistory\WithDrawHistory;
use binancephpapi\Wallet\TradeFee\TradeFee;
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

    public function fiatDepositHistory(){
        return new FiatDepositHistory($this->http);
    }

    public function fiatPaymentHistory(){
        return new FiatPaymentsHistory($this->http);
    }

    public function accountStatus(){
        return new AccountStatus\AccountStatus($this->http);
    }

    public function accountApiTradingStatus(){
        return new AccountApiTradingStatus($this->http);
    }

    public function dustLog(){
        return new DustLog($this->http);
    }

    public function assetDetail(){
        return new AssetDetail($this->http);
    }

    public function tradeFee(){
        return new TradeFee($this->http);
    }







}

