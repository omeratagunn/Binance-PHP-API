<?php


namespace binancephpapi\Market\ExchangeInformation;


use binancephpapi\Config\Constants;
use binancephpapi\Http\Http;
use binancephpapi\Http\Query;

class ExchangeInformation
{
    protected string $url;
    protected Http $http;
    private string $method = 'GET';

    public function __construct(Http $http){
        $this->url = Constants::$url.'/api/v3/exchangeInfo';
        $this->http = $http;
    }

    public function get(){
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http ,[] );
    }

    public function getWithSingleSymbol(string $symbol){
        $params = ['symbol' => $symbol];
        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http , $params);
    }

    public function getWithMultipleSymbols(array $symbols){

        $params['symbols'] = Constants::arrayToString($symbols);

        return Query::QueryWithoutAuthorization($this->method, $this->url,$this->http , $params);
    }

}
