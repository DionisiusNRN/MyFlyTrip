<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransConfig
{
    public static function init()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public static function createSnapToken($params)
    {
        self::init(); // pastikan config udah di-set
        return Snap::getSnapToken($params);
    }
}
