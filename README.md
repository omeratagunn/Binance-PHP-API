# Binance-PHP-API
Client for Binance API

# Examples 

```
use binancephpapi\Binance;
use binancephpapi\Config\Config;

$binance = new Binance('', ''); // first public, second secret // 

$getAllCoins = $binance->wallet()->getAllCoins();

$getSnapSpot = $binance->wallet()->getDailyAccountSnapShot()->spot();

$getSnapSpotWithOptions = $binance->wallet()->getDailyAccountSnapShot()->spotWithOptions(3, time()- 500, time());
```
