<?php


namespace binancephpapi\Market\Connectivity;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class TestConnectivity
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/api/v3/ping';
        $this->http = $http;
    }

    public function get(){
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http ,[] );
    }

    public function getWithOptions(array $params){ // only recvWindow can be passed, not neccesary but who am i to judge //
        return Query::QueryWithoutAuthorization($$this->method, $this->url,$this->http , $params);
    }

}
