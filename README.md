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

**Update composer:**
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

####Webhooks Setup
This library has in-built support to easily configure the webhook notifications of Aftership.
To configure the Webhook Route, open the published configuration file and setup the following configurations.

```
'web_hook' => array(
		'enabled'   => true,                    //Set this to true to enable Web hook Route
		'route_url' => '/wehbooks/aftership',   //Setup the Route Url that has been configured on Aftership Control Panel
		'listener'  => array(
			'type'             => 'event',      //Can be "event" or "queue"
			'handler'          => '',           //Handler to be called when the Webhook notification is received
			'queue_name'       => '',           //Used only if the type == "queue"
			'queue_connection' => ''            //To be used if a connection based queue needs to be used
		)
	)
```