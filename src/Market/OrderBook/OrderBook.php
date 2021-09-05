<?php


namespace binancephpapi\Market\OrderBook;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class OrderBook
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/api/v3/depth';
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
