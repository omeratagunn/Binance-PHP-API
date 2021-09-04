<?php

include_once(__DIR__.'/../../vendor/autoload.php');

use binancephpapi\Binance;
use binancephpapi\Config\Config;

$binance = new Binance(Config::$publicKey, Config::$secretKey);
$t = $binance->wallet()->getAllCoins();

