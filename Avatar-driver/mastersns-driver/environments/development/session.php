<?php
/**
 * Development session configuration (override)
 * Uses Redis for session storage when running in development Docker.
 */

return array(
    // set it to false to prevent the static session from auto-initializing
    'auto_initialize'    => true,

    // set it to false to prevent manually created session instances from being autostarted
    'auto_start'         => true,

    // use Redis as the session driver for development
    'driver'             => 'redis',

    // security checks
    'match_ip'           => false,
    'match_ua'           => true,

    'cookie_domain'      => '',
    'cookie_path'        => '/',
    'cookie_http_only'   => null,
    'encrypt_cookie'     => true,
    'expire_on_close'    => false,

    // session expiration (14 days)
    'expiration_time'    => 60 * 60 * 24 * 14,
    'login_session_expiration_time' => 60 * 60 * 24 * 30,

    'rotation_time'      => 300,
    'flash_id'           => 'flash',
    'flash_auto_expire'  => true,
    'flash_expire_after_get' => true,
    'post_cookie_name'   => '',
    'http_header_name'   => 'Session-Id',
    'enable_cookie'      => true,

    // driver specific settings
    'cookie' => array(
        'cookie_name' => 'fuelcid',
    ),

    'file' => array(
        'cookie_name'     => 'fuelfid',
        'path'            => '/tmp',
        'gc_probability'  => 5,
    ),

    'memcached' => array(
        'cookie_name' => 'fuelmid',
        'servers'     => array(
            'default' => array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
        ),
    ),

    'db' => array(
        'cookie_name'      => 'fueldid',
        // use the 'default' connection defined in config/development/db.php
        'database'         => 'default',
        'table'            => 'sessions',
        'gc_probability'   => 5,
    ),

    'redis' => array(
        'cookie_name' => 'fuelrid',
        // use the 'default' redis connection defined in config/development/db.php
        'database'    => 'default',
    ),
);
