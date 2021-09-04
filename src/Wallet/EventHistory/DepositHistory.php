<?php


namespace binancephpapi\Wallet\EventHistory;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class DepositHistory
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/sapi/v1/capital/deposit/hisrec';
        $this->http = $http;
    }

    public function get(){
        return Query::queryApi($this->method, [], $this->url, $this->http);
    }

    public function getWithOptions(array $params){
        return Query::queryApi($this->method, $params, $this->url, $this->http);
    }

}
