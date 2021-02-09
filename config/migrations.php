<?php

declare(strict_types=1);

return [

    // Entity Manager Migrations Configuration

    'default' => [
        // Migration Repository Table
        'table'     => 'migrations',

        // Migration Directory
        'directory' => database_path('migrations'),

        // Migration Organize Directory
        'organize_migrations' => false,

        // Migration Namespace
        'namespace' => 'Database\\Migrations',

        // Migration Repository Table
        'schema'    => [
            'filter' => '/^(?!password_resets|failed_jobs).*$/'
        ],

        // Migration Version Column Length
        'version_column_length' => 14
    ],
];
