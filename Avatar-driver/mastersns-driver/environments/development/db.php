<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'active'  => 'default',
	'default' => array(
        'connection'   => array(
            'hostname' => 'db',
            'database' => 'mastersns',
            'username' => 'root',
            'password' => '11111111',
            'persistent' => false,
		),
        // This setting is used to connect to another DB.
        'type'         => 'mysqli',
        'table_prefix' => '',
        'identifier'   => '`',
        'charset'      => 'utf8mb4',
        'profiling'    => true,
    ),

    'replica' => array(
        'connection'   => array(
            'hostname' => 'db',
            'database' => 'mastersns',
            'username' => 'root',
            'password' => '11111111',
            'persistent' => false,
		),
        // This setting is used to connect to another DB.
        'type'         => 'mysqli',
        'table_prefix' => '',
        'identifier'   => '`',
        'charset'      => 'utf8mb4',
        'profiling'    => true,
    ),

    'mgpf' => array(
        'connection'   => array(
            'hostname' => 'db',
            'database' => 'mastersns_mgpf',
            'username' => 'root',
            'password' => '11111111',
            'persistent' => false,
		),
        // This setting is used to connect to another DB.
        'type'         => 'mysqli',
        'table_prefix' => '',
        'identifier'   => '`',
        'charset'      => 'utf8mb4',
        'profiling'    => true,
    ),

    'sandbox' => array(
        'connection'   => array(
            'hostname' => 'db',
            'database' => 'mastersns_sandbox',
            'username' => 'root',
            'password' => '11111111',
            'persistent' => false,
        ),
        // This setting is used to connect to another DB.
        'type'         => 'mysqli',
        'table_prefix' => '',
        'identifier'   => '`',
        'charset'      => 'utf8mb4',
        'profiling'    => true,
    ),

    'redis' => array(
        'default' => array(
            'hostname' => 'redis',
            'port'     => 6379,
            'timeout'  => null,
        ),
        'inmsg' => array(
            'hostname' => 'redis',
            'port' => 6379,
            'timeout' => null,
        ),
     ),
);
