<?php


namespace binancephpapi\Config;


class Constants
{
    public static string $url = 'https://api.binance.com';

    public static function arrayToString(array $data){
        $log_a = "[";

        foreach ($data as $key => $value) {
            $log_a .= '"'.$value.'",';
        }
        $log_a = rtrim($log_a, ',');
        $log_a .= ']';

        return $log_a;
    }

}
