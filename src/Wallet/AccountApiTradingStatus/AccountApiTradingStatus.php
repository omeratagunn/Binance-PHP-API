<?php


namespace binancephpapi\Wallet\AccountApiTradingStatus;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class AccountApiTradingStatus
{

    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/sapi/v1/account/apiTradingStatus';
        $this->http = $http;
    }

    public function get(){
        return Query::queryApi($this->method, [], $this->url, $this->http);
    }

    public function getWithOptions(array $params){ // only recvWindow can be passed, not neccesary but who am i to judge //
        return Query::queryApi($this->method, $params, $this->url, $this->http);
    }

}
