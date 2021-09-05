<?php


namespace binancephpapi\Market\RecentTradesList;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class RecentTradesList
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/api/v3/trades';
        $this->http = $http;
    }

    public function getWithSymbol(string $symbol){
        $params = ['symbol' => $symbol];
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http ,$params );
    }

    public function getWithSymbolAndLimit(string $symbol, int $limit){
        $params = [
            'symbol' => $symbol,
            'limit' => $limit
        ];
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http , $params);
    }

}
