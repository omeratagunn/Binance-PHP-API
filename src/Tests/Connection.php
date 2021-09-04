<?php


namespace binancephpapi\Tests;

use binancephpapi\Binance;
use binancephpapi\Config\Config;
use PHPUnit\Framework\TestCase;

class Connection extends TestCase
{

    public function testBinanceConnection(){
        $w = new Binance(Config::$publicKey, Config::$secretKey);
        $b = $w->systemStatus();
        $this->assertJson($b);
    }


}
