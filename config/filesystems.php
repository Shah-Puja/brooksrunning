<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Default Filesystem Disk
      |--------------------------------------------------------------------------
      |
      | Here you may specify the default filesystem disk that should be used
      | by the framework. The "local" disk, as well as a variety of cloud
      | based disks are available to your application. Just store away!
      |
     */

    'default' => env('FILESYSTEM_DRIVER', 'local'),
    /*
      |--------------------------------------------------------------------------
      | Default Cloud Filesystem Disk
      |--------------------------------------------------------------------------
      |
      | Many applications store files both locally and in the cloud. For this
      | reason, you may specify a default "cloud" driver here. This driver
      | will be bound as the Cloud disk implementation in the container.
      |
     */
    'cloud' => env('FILESYSTEM_CLOUD', 's3'),
    /*
      |--------------------------------------------------------------------------
      | Filesystem Disks
      |--------------------------------------------------------------------------
      |
      | Here you may configure as many filesystem "disks" as you wish, and you
      | may even configure multiple disks of the same driver. Defaults have
      | been setup for each driver as an example of the required options.
      |
      | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
      |
     */
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'uploads_event_logo' => [
            'driver' => 'local',
            'root' => public_path('images/new-events/monthly/logo'),
            'url' => env('APP_URL') . "/images/new-events/monthly/logo",
        ],
        'uploads_event_banner' => [
            'driver' => 'local',
            'root' => public_path('images/new-events/banner'),
            'url' => env('APP_URL') . "/images/new-events/banner",
        ],
        '404_page'=> [
            'driver' => 'local',
            'root'   => public_path('/images/error-404'),
            'url'    => env('APP_URL')."/images/error-404",
        ],
        'uploads_competition' => [
            'driver' => 'local',
            'root' => public_path('images/competition-single'),
            'url' => env('APP_URL') . "/images/competition-single",
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
        'sftp_benefit' => [
            'driver' => 'sftp',
            'host' => env('IMAGE_SERVER'),
            'username' => env('IMAGE_SERVER_USER'),
            'password' => env('IMAGE_SERVER_PSWD'),        
        ],
        'sftp' => [
            'driver' => 'sftp',
            'host' => env('MEDIBANK_SFTP_HOST'),
            'username' => env('MEDIBANK_SFTP_USER'),
            'password' => env('MEDIBANK_SFTP__PSWD')
        ]
    ],
];
