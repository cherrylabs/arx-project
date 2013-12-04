<?php
/**
 * Environment configuration
 *
 * By default, 5 environments level is commonly used.
 *
 * You can override any function to suit your needs in your config folder.
 * Warning, the order is very important as it defines also a ENV level
 * useful for third developer to check an environment level.
 *
 * It accept closure function, string (will apply a preg_match on $_SERVER['HTTP_HOST'], or array()
 *
 */
return array(
    'console' => function() {
        return php_sapi_name() == 'cli' ? true : false;
    }, //level 0
    'local' => "/^loc\.|.localhost$|localhost/i", //level 1
    'dev' => "/^dev\.|.dev$/i", //level 2
    'demo' => "/^demo\.|.demo$/i", //level 3
    'production' => "/[a-z0-9_]+/i" //level 4
);