<?php
/**
 * Opauth
 * Multi-provider authentication framework for PHP
 * FuelPHP Package by Andreo Vieira <andreoav@gmail.com>
 *
 * @copyright    Copyright © 2012 U-Zyn Chua (http://uzyn.com)
 * @link         http://opauth.org
 * @package      Opauth
 * @license      MIT License
 */

namespace Opauth;

/**
 * Opauth configuration file with advanced options.
 * 
 * Copy this file to fuel/app/config and tweak as you like.
 */
return array(

    /**
     * 単一のローカルアカウントへの複数の OAuth プロバイダのリンクをサポートするかどうか
     * false に設定されていて、かつプロバイダが既にリンクされている場合に
     * ２つ目のプロバイダを使用した場合、ユーザへはエラーメッセージが表示されログインが拒否されます
     */
    'link_multiple_providers' => false,

    /**
     * Path whre Fuel-Opauth is accessed.
     * 
     * Begins and ends with /.
     * eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'.
     * if Opauth is reached via http://auth.example.org/, path is '/'.
     */
//    'path' => '/auth/',
    'path' => '/oauth2/login/',
    
    /**
     * Uncoment if you would like to view debug messages.
     */
    'debug' => true,
     
     /**
      * Callback URL: redirected to after authentication, successful or otherwise.
      * 
      * eg. if Opauth callback is reached via http://example.org/auth/callback, callback_url id '/auth/callback/'
      */
    'callback_url'  => '/oauth2/callback/',
    
    /**
     * Callback transport, for sending of $auth response.
     * 'session' - Default. Works best unless callback_url is on a different domain than Opauth.
     * 'post'    - Works cross-domain, but relies on availability of client side JavaScript.
     * 'get'     - Works cross-domain, but may be limited or corrupted by browser URL length limit
     *             (eg. IE8/IE9 has 2083-char limit).
     */
     //'callback_transport' => 'session',
     
    /**
     * A random string used for signing of $auth response.
     */
//    'security_salt' => 'LDFmiilYf8Fyw5W10rx4W1KsVrieQCnpBzzpTBWA5vJidQKDx8pMJbmw28R1C4m',
    'security_salt' => 'dlfEHYwraljasjaljoiwehgOLEsad',
    
    /**
     * Higher value, better security, slower hashing.
     * Lower value, lower security, faster hashing.
     */
    //'security_iteration' => 300,
     
    /**
     * Time limit for valid $auth response, starting form $auth response generation to validation.
     */
    //'security_timeout' => '2 minutes',
      
    /**
     * Directory wher Opauth strategies reside.
     */
    //'strategy_dir' => PKGPATH . '/Opauth/classes/Strategy/',

    'Strategy' => array(
        'Facebook' => array(
            'app_id'     => '725736127510988',
            'app_secret' => '9ed6f4e9314e1c87cbdb902ec3d6eb2d',
            'api_version' => 'v2.5',
//            'scope'       => 'public_profile,user_friends,user_photos,email,user_birthday,user_location',
            'redirect_uri' => 'http://cnt5.devenb.com/oauth2/login/facebook/int_callback'
        ),
        'Twitter' => array(
            'key'          => 'skLa19FnfAgyXRD6Uzr6hlKfN',
            'secret'       => 'fMGSu2FjOajnruNRU2Zy6ZLw3yp70xqdyyAcOeZNLDsj1TrGCD',
            'redirect_uri' => 'http://cnt5.devenb.com/oauth2/login/twitter/oauth2callback'
        ),
        'Google' => array(
            'client_id'     => '1036992691461-1957m1t28f1r28evna1q0ut6j1gbpkri.apps.googleusercontent.com',
            'client_secret' => 'fXrKeME5bT-YOnET9a82e0nv'
        ),
        'Yahoojp' => array(
            'client_id'     => 'dj0zaiZpPU4wRzFOamhSRGF2QyZzPWNvbnN1bWVyc2VjcmV0Jng9ZGU-',
            'client_secret' => '1949506775c0915c34e82d8c8ddb985dafe2b13a'
        ),
    ),
);