<?php


namespace binancephpapi\Wallet\AccountSnapShot;


use binancephpapi\Config\Config;
use binancephpapi\Http\Http;
use binancephpapi\Wallet\WalletEndPoints;
use GuzzleHttp\Exception\GuzzleException;

class AccountSnapShot
{

    private $url = 'https://api.binance.com/sapi/v1/capital/config/getall';
    protected Http $http;

    protected array $types = [
        'SPOT' => ['type' => 'SPOT'],
        'MARGIN' => ['type' => 'MARGIN'],
        'FUTURES' => ['type' => 'FUTURES']
    ];

    protected array $options = [
        'startTime' =>  0,
        'endTime' =>  0,
        'limit' => 0
    ];

    public function __construct(Http $http)
    {
        $this->http = $http;

    }

    public function spot(){
        return $this->builder($this->types['SPOT']);
    }
    public function spotWithOptions(int $limit = 0, int $startTime = 0, int $endTime = 0){
        $this->options['limit'] = $limit;
        $this->options['startTime'] = $startTime;
        $this->options['endTime'] = $endTime;

        return $this->builder($this->types['SPOT']);

    }

    public function margin(){

        return $this->builder($this->types['MARGIN']);
    }
    public function marginWithOptions(int $limit = 0, int $startTime = 0, int $endTime = 0){
        $this->options['limit'] = $limit;
        $this->options['startTime'] = $startTime;
        $this->options['endTime'] = $endTime;

        return $this->builder($this->types['MARGIN']);

    }

    public function futures(){
        return $this->builder($this->types['FUTURES']);
    }

    public function futuresWithOptions(int $limit = 0, int $startTime = 0, int $endTime = 0){
        $this->options['limit'] = $limit;
        $this->options['startTime'] = $startTime;
        $this->options['endTime'] = $endTime;

        return $this->builder($this->types['FUTURES']);

    }

    protected function builder(array $type){
        $type['limit'] = $this->options['limit'];
        $type['startTime'] = $this->options['startTime'];
        $type['endTime'] = $this->options['endTime'];
        $query = Http::binanceQueryBuilder($type);

        try {
            $request = $this->http->make()->request('GET',  $this->url,
                [
                    'headers' => [
                        'X-MBX-APIKEY' => Config::$publicKey,
                        'Accept' => 'application/json',
                    ],
                    'query' => ['type'=>$type['type'], 'limit' => $type['limit'], 'startTime' => $type['startTime'], 'endTime' => $type['endTime'],  'timestamp' => $query['BinanceServerTime'], 'signature' => $query['signature']]
                ]);


        } catch (GuzzleException $e) {

            return $e->getMessage();
        }
        return $request->getBody()->getContents();
    }

}
