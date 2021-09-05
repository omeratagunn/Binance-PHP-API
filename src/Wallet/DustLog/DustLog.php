<?php


namespace binancephpapi\Wallet\DustLog;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class DustLog
{

    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/sapi/v1/asset/dribblet';
        $this->http = $http;
    }

    public function get(){
        return Query::queryApi($this->method, [], $this->url, $this->http);
    }

    public function getWithOptions(array $params){
        return Query::queryApi($this->method, $params, $this->url, $this->http);
    }
}
