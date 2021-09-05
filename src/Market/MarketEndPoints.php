<?php


namespace binancephpapi\Market;

use binancephpapi\Http\Http;
use binancephpapi\Market\Connectivity\TestConnectivity;
use binancephpapi\Market\ExchangeInformation\ExchangeInformation;


class MarketEndPoints
{

    protected Http $http;

    public function __construct(Http $http){

        $this->http = $http;
    }


    public function testConnectivity(){
        return new TestConnectivity($this->http);
    }

    public function exChangeInformation(){
        return new ExchangeInformation($this->http);
    }


}
