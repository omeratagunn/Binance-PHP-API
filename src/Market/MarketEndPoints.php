<?php


namespace binancephpapi\Market;

use binancephpapi\Http\Http;
use binancephpapi\Market\Connectivity\TestConnectivity;
use binancephpapi\Market\ExchangeInformation\ExchangeInformation;
use binancephpapi\Market\OldTradeLookUp\OldTradeLookUp;
use binancephpapi\Market\OrderBook\OrderBook;
use binancephpapi\Market\RecentTradesList\RecentTradesList;


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

    public function orderBook(){
        return new OrderBook($this->http);
    }

    public function recentTradesList(){
        return new RecentTradesList($this->http);
    }

    public function oldTradeLookUp(){
        return new OldTradeLookUp($this->http);
    }


}
