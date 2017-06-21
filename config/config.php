<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Config System
    |--------------------------------------------------------------------------
    */

    'on' => 'on',
    'off' => 'off',

    'null' => 'Null',

    'user' => [
        'lang' => 'user_lang',
        'slack' => 'slack_notification',
        'key' => [
            'slack' => 'slack_api_key',
        ],

        'default' => [
            'user_lang' => 'en',
            'slack_notification' => 'off',
            'slack_api_key' => 'Null',
        ],
    ],



];
