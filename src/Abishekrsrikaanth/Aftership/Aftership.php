<?php

namespace Abishekrsrikaanth\Aftership;


use AfterShip\Couriers;
use AfterShip\Tracking;
use Illuminate\Support\Facades\Config;

class Aftership
{
	public function Couriers() {
		return new Couriers(Config::get('aftership-laravel::config.api_key'));
	}

	public function Tracking() {
		return new Tracking(Config::get('aftership-laravel::config.api_key'));
	}
}