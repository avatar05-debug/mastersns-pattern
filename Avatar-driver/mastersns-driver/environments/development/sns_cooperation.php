<?php
/**
 * Sns Cooperation Config
 *
 * @author Tatsuya NOGUCHI
 */

return [

    'Provider' => [
        'Instagram' => [
            'client_id'             => '80ae5f7bce6241209366e3ad56377116',
            'client_secret'         => '2cfed4e300e54465b9f14ac843521f4c',
            'verify_token'          => 'dAodwsDDx2lfj9dfd',
            'scope'                 => 'basic+comments+likes',
            'redirect_uri'          => 'http://connet.adtri.net/sns/instagram/callback',
            'realtime_redirect_uri' => 'http://connet.adtri.net/sns/instagram/callback_realtime',
        ],

        'Facebook' => [
            'app_id'       => '', // opauth.php Strategy.Facebook.app_id
            'app_secret'   => '', // opauth.php Strategy.Facebook.app_secret
            'api_version'  => '', // opauth.php Strategy.Facebook.api_version
            'scope'        => ['public_profile'], // Added later for each function -> 'publish_actions','user_posts'
            'redirect_uri' => 'http://connet.adtri.net/sns/facebook/callback',
            'verify_token' => 'Ts38D]9sot#8*@2B',
            'app_access_token' => '759516357509131|HaTsBn9N91d87qy_9QBBrb7H0cM',
        ],

        'Twitter' => [
            'consumer_key'        => '', // opauth.php Strategy.Twitter.key
            'consumer_secret'     => '', // opauth.php Strategy.Twitter.secret
            'redirect_uri'        => 'http://connet.adtri.net/sns/twitter/callback',
            'authorize_knowb_url' => '/sns/twitter/authorize',
        ],
    ],

    'file_upload_public_dir' => '/domain/connet/public/',
];
