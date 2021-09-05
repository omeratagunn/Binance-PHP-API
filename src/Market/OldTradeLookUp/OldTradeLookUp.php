<?php


namespace binancephpapi\Market\OldTradeLookUp;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class OldTradeLookUp
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/api/v3/historicalTrades';
        $this->http = $http;
    }

    public function getWithSymbol(string $symbol){
        $params = ['symbol' => $symbol];
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http ,$params );
    }

    public function getWithOptions(array $queryParams){
        $params = $queryParams;
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http , $params);
    }

}
