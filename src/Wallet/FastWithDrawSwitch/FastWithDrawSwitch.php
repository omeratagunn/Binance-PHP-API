<?php


namespace binancephpapi\Wallet\FastWithDrawSwitch;


use binancephpapi\Config\Config;
use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;
use GuzzleHttp\Exception\GuzzleException;

class FastWithDrawSwitch
{
    private Http $http;
    private string $url;
    private string $method = 'POST';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/sapi/v1/account';
        $this->http = $http;

    }

    public function enable(){
        $this->url .= '/enableFastWithdrawSwitch';
        return Query::queryApi($this->method, [], $this->url, $this->http);

    }

    public function disable(){
        $this->url .= '/disableFastWithdrawSwitch';
        return Query::queryApi($this->method, [], $this->url, $this->http);
    }


}
