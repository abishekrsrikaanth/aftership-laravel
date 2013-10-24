<?php
use \Illuminate\Support\Facades\Config,
	\Illuminate\Support\Facades\Route,
	\Illuminate\Support\Facades\Input,
	\Illuminate\Support\Facades\Event,
	\Illuminate\Support\Facades\Queue;

$webhook_enabled = Config::get('aftership::web_hook.enabled');
if ($webhook_enabled == true) {
	$route_url = Config::get('aftership::web_hook.route_url');
	if (!empty($route_url)) {
		Route::post($route_url, function () {
			$listener_type = Config::get('aftership::web_hook.listener.type');
			$handler       = Config::get('aftership::web_hook.listener.handler');
			if (empty($listener_type) || empty($handler))
				throw new Exception('Listener Configuration is incomplete.');

			if ($listener_type == "event") {
				Event::fire($handler, array('data' => Input::all()));
			} else if ($listener_type == "queue") {
				$queue_connection = Config::get('aftership::web_hook.listener.queue_connection');
				$queue_name       = Config::get('aftership::web_hook.listener.queue_name');

				if (empty($queue_connection)) {
					if (empty($queue_name))
						Queue::push($handler, array('data' => Input::all()));
					else
						Queue::push($handler, array('data' => Input::all()), $queue_name);
				} else {
					if (empty($queue_name))
						Queue::connection($queue_connection)->push($handler, array('data' => Input::all()));
					else
						Queue::connection($queue_connection)->push($handler, array('data' => Input::all()), $queue_name);
				}
			}
		});
	} else
		throw new Exception('Route URL cannot be empty when Webhook is enabled.');
}