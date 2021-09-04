<?php


namespace binancephpapi\Tests;


use binancephpapi\Binance;
use binancephpapi\Config\Config;
use PHPUnit\Framework\TestCase;

class Wallet extends TestCase
{
    private Binance $binance;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->binance = new Binance(Config::$publicKey, Config::$secretKey);
    }

    public function testGetAllWalletBulk(){

        $t = $this->binance->wallet()->getAllCoins();
        $this->assertJson($t);
    }

    public function testGetAccountSnapShotSpot(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->spot());

    }
    public function testGetAccountSnapShotSpotWithOptions(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->spotWithOptions(3, time() - 500, time()));

    }

    public function testGetAccountSnapShotMargin(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->margin());

    }

    public function testGetAccountSnapShotMarginWithOptions(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->marginWithOptions(3, time() - 500, time()));

    }

    public function testGetAccountSnapShotFutures(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->futures());

    }

    public function testGetAccountSnapShotFuturesWithOptions(){

        $this->assertJson($this->binance->wallet()->getDailyAccountSnapShot()->futuresWithOptions(3, time() - 500, time()));

    }

    public function testUnAuthorizedFastWithDrawSwitchEnable(){
        $res = $this->binance->wallet()->fastWithDrawSwitch()->enable();
            // you need authorization //
        $this->assertIsString('You are not authorized', $res);


    }

    public function testUnAuthorizedFastWithDrawSwitchDisable(){
        $res = $this->binance->wallet()->fastWithDrawSwitch()->disable();
        // you need authorization //
        $this->assertIsString('You are not authorized', $res);
    }

}
