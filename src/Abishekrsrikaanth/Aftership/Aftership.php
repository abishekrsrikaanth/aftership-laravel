<?php

namespace Abishekrsrikaanth\Aftership;

use AfterShip\Couriers;
use AfterShip\LastCheckPoint;
use AfterShip\Notifications;
use AfterShip\Tracking;
use Illuminate\Support\Facades\Config;

class Aftership
{
    public function Couriers()
    {
        return new Couriers(Config::get('aftership-laravel::api_key'));
    }

    public function Tracking()
    {
        return new Tracking(Config::get('aftership-laravel::api_key'));
    }

    public function LastCheckPoint()
    {
        return new LastCheckPoint(Config::get('aftership-laravel::api_key'));
    }

    public function Notifications()
    {
        return new Notifications(Config::get('aftership-laravel::api_key'));
    }
}
