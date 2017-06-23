<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Super Admin
    |--------------------------------------------------------------------------
    */
    'super_admin' => [
        'id' => env('SUPER_ADMIN_ID', 1),
        'name' => env('SUPER_ADMIN_NAME', 'Admin'),
        'email' => env('SUPER_ADMIN_EMAIL', 'admin@lindelin.org'),
        'password' => env('SUPER_ADMIN_PASS', '!lindelin'),
    ],

    'project_admin' => 777,

    'system-notification' => [
        'mail' => env('SYSTEM_NOTIFICATION_MAIL'),
        'slack' => env('SYSTEM_NOTIFICATION_SLACK'),
    ]

];
