<?php
return array(
    'api_key'  => '',
    'web_hook' => array(
        'enabled'   => false,
        'route_url' => '/wehbooks/aftership',
        'listener'  => array(
            'type'             => 'event',
            'handler'          => '',
            'queue_name'       => '', //Used only if the type == "queue"
            'queue_connection' => '' //To be used if a connection based queue needs to be used
        )
    )
);
