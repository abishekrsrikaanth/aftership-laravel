###Laravel 4 package to Integrate with Aftership API
------

####Installation

**Using Composer**
```
 "require": {
        ....
        "abishekrsrikaanth/aftership-laravel": "dev-master"
    },
```

Update composer:
```
$ php composer.phar update
```

Add the provider to your app/config/app.php:
```
'providers' => array(
    ...
    'Abishekrsrikaanth\Aftership\AftershipServiceProvider',
),
```

and the Facade info on app/config/app.php
```
'aliases'   => array(
    ...
	'AfterShip'      => 'Abishekrsrikaanth\Aftership\Facades\Aftership',
),
```
Publish the Configuration and setup the config with the credentials of the different email providers
```
php artisan config:publish abishekrsrikaanth/aftership-laravel
```

####Couriers

Getting an instance of the Courier Object
```
$courier = AfterShip::Couriers();
$response = $courier->get();
```

####Tracking

Getting an instance of the Tracking Object
```
$tracking = AfterShip::Tracking();
$response = $tracking->get($options);
```