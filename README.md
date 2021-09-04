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

// you need to authorize your api credentials for this action //
$enableFastWithDrawSwitch = $binance->wallet()->fastWithDrawSwitch()->enable();
$enableFastWithDrawSwitch = $binance->wallet()->fastWithDrawSwitch()->disable();

$depositHistory = $binance->wallet()->depositHistory()->get();
$depositHistoryWithOptions = $binance->wallet()->depositHistory()->getWithOptions([
    'status' => 1, // 0(0:pending,6: credited but cannot withdraw, 1:success)
    'coin' => 'BTC'
]);

$withDrawHistory = $binance->wallet()->withDrawHistory()->get();
$withDrawHistoryWithOptions = $binance->wallet()->withDrawHistory()->getWithOptions([
    'status' =>1,
    'coin' => 'ETH'

]);
```
