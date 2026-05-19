<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

if (!isset($_SERVER['FUEL_ENV'])) {
    $_SERVER['FUEL_ENV'] = "development";
}

if (!function_exists("apache_note")) {
    function apache_note() {}
}

return array(

	/**
	 * Site
	 */
    'site' => array(
        'name'   => 'aocca',
        'name_kana'   => 'アオッカ',
        'domain' => 'localhost:8216',
        'url'    => array(
            'front'      => 'http://localhost:8216/',
            'admin'      => 'http://localhost:8216/admin/',
            'inquiry'    => 'http://localhost:8216/inquiry/',
            'deliverstop'=> 'http://localhost:8216/deliverstop/',
            'chat'=> 'https://cnt11.devenb.com/',
            'app'=> 'knowb://localhost/', 
            // 'cdndomain' => 'https://nalcdn.devenb.com/',
            'cdndomain' => 'https://cdn.devenb.com/',
        ),
        'maildomain' => 'mail.connet.adtri.net',
        'content' => 'mastersns', // コンテンツ(管理画面切り替え用-変更不可)
        'agecheckpath'=> '/var/www/public/assets/admin/img/agecheck',
        'chatpath' => '/domain/chat5',
        'photopath'=> '/var/www/public/assets/img/photos',
    ),
    //    'profiling'  => true,
    'log_threshold'    => \Fuel::L_INFO,
    
    /**
     * PUSH関連
     */
    'push' => array(
        'apns' => array(
            'certificate' => array(
                'conb'   => 'certificate/marryAPNs_testfaily.pem',  // 開発者証明書
                'server' => 'certificate/server.pem', // ルート証明書
                'passphrase' => 'marry' // パスフレーズ
            ),
        ),
        'gcm' => array(
            'url'    => 'https://fcm.googleapis.com/fcm/send',  // 接続URL
            'apiKey' => 'AAAAwFyeNCs:APA91bGCZP_E-G6Na2NaBhKcGfk0VzGjrwWZC-LgCBvJOPIEoRZ_akQ0RU3SWdkBsNC6uMQT_-E-Pl9_8AsVEcac_jdr2WIMNB68YjHICZtHBXGDBgzF0Av9QWqwPG_hU_lhd73KEsww'    // APIキー
        ),
    ),
    
    'oil_path' => '/var/www/html/oil',
    
    // デザイン切替用
    'design' => array(
        'admin' => array(
            'header' => array(
                'font-color' => '#fff',
                'hover-color' => 'black',
                'background-color' => '#6495ed',
            )
        )
    ),
    
    'aws_s3' => array(
        'use' => true,
        'key'    => 'AKIAI3DHTMWNB3GQMYRQ',
        'secret' => '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',
        'bucket' => "nal-devenb-aocca-photos",
        'age-bucket' => 'nal-devenb-aocca-admin-img-agecheck',
        'admin-bucket' => 'nal-devenb-aocca-admin-fuel',
        'html-bucket' => 'nal-devenb-aocca-html',
        'fuel-bucket' => 'nal-devenb-aocca-fuel',
        'distribution_id' => "E2THZN81FTS5E",
        'region' => 'ap-northeast-1',
    ),
    'aws_cf' => array(
        'key_pair_id' => 'APKAJO5TPERJWO4GXX7A',
        'private_pem' => 'cloudfront_dev_nal.pem',
    ),
    'nb_worker_ip' => array(
            '153.143.225.88', // yushima
            '113.33.153.146', // nbs-corp
            '113.43.255.194', // nbs-exam
            '118.70.126.57', # NAL
            '118.70.128.64', # NAL
            '123.25.21.255', # NAL
            '115.125.190.11',
    ),
    // 'number' => array(
    //     'LOC' => 'CN', // CN(development), AO(staging), AD(production)
    //     'url' => 'http://210.163.132.252:8100/vcstool/servlet/live?LOC=%s&ID=%s'
    // ),
    
    // 電話番号認証(クロノス)
    'number' => '0345708708',

    'smslink' => [
        'endpoint' => 'https://sand-api-smslink.nexlink2.jp/api/v1/delivery',
        'token'    => 'f120d972-338a-44fe-bb12-726857836f84',
    ],

    'googleplay_check_short_expiry' => false,

    'force_release_at_pagecustom_ip' => array(
        '113.33.153.146', #newbees(usen1 = NBNW011)
        '115.125.190.11', #newbees(usen2 = NBNW021)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '180.62.174.47', #newbees(infosphere)
        '127.0.0.1',
    ),


    'extend_permit_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '118.70.126.57', # NAL
        '118.70.128.64', # NAL
        '123.25.21.255', # NAL
        '127.0.0.1',
    ),


    'extend2_permit_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '127.0.0.1',
    ),


    'extend3_permit_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '127.0.0.1',
    ),


    'affiliate_permit_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '127.0.0.1',
    ),


    'member_detail_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '127.0.0.1',
    ),

    'appleid_receipt_btn_permit_ip' => array(
        '113.33.153.146',   # newbees(yawaragi)
        '153.152.23.105',  # wifi(emergency)
        '153.152.23.106',  # wifi(emergency)
        '127.0.0.1',
    ),
);
