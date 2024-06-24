<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Specifies the default filesystem disk that should be used by the framework.
    | You can change this in your environment (.env) file with the FILESYSTEM_DISK variable.
    | Options: 'local', 'public', 's3', etc.
    |
    */
    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Configure multiple filesystem "disks" here, each with its own settings.
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */
    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'), // Root directory for the 'local' disk
            'url' => env('APP_URL').'', // URL for accessing files on the 'local' disk
            'visibility' => 'private', // Visibility setting for files ('private' or 'public')
        ],

        'public' => [
            'driver' => 'local',
            'root' => public_path('public/'), // Root directory for the 'public' disk
            'url' => env('APP_URL').'', // URL for accessing files on the 'public' disk
            'visibility' => 'public', // Visibility setting for files ('private' or 'public')
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Configure symbolic links that will be created when `storage:link` Artisan command is executed.
    |
    */
    'links' => [
        public_path('storage') => storage_path('/public'), // Creates a symbolic link from public/storage to storage/app/public
    ],

];
