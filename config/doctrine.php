<?php

declare(strict_types=1);

use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Loggers\LaravelDebugbarLogger;

return [

    // Entity Managers
    'managers' => [
        'default' => [
            'dev' => env('APP_DEBUG', false),
            'meta' => env('DOCTRINE_METADATA', 'annotations'),
            'connection' => env('DB_CONNECTION', 'sqlite'),
            'namespaces' => [
                'App\Entity'
            ],
            'paths' => [
                base_path('app/Entity'),
            ],
            'repository' => EntityRepository::class,
            'proxies' => [
                'namespace' => false,
                'path' => storage_path('proxies'),
                'auto_generate' => env('DOCTRINE_PROXY_AUTOGENERATE', false)
            ],

            // Doctrine events
            'events' => [
                'listeners' => [],
                'subscribers' => []
            ],
            'filters' => [],

            // Doctrine mapping types
            'mapping_types' => [
                //'enum' => 'string'
            ]
        ]
    ],

    // Doctrine Extensions
    'extensions' => [],

    // Doctrine custom types
    'custom_types' => [
    ],

    // DQL custom datetime functions
    'custom_datetime_functions' => [],

    // DQL custom numeric functions
    'custom_numeric_functions' => [],

    // DQL custom string functions
    'custom_string_functions' => [],

    // Register custom hydrators
    'custom_hydration_modes' => [
        // e.g. 'hydrationModeName' => MyHydrator::class,
    ],

    'logger' => env('DOCTRINE_LOGGER', LaravelDebugbarLogger::class),

    // Cache
    'cache' => [
        'second_level'  => false,
        'default'       => env('DOCTRINE_CACHE', 'array'),
        'namespace'     => null,
        'metadata'      => [
            'driver'    => env('DOCTRINE_METADATA_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'query'         => [
            'driver'    => env('DOCTRINE_QUERY_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'result'        => [
            'driver'    => env('DOCTRINE_RESULT_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
    ],
    // Gedmo extensions
    'gedmo'                      => [
        'all_mappings' => false
    ],

    // Validation
    'doctrine_presence_verifier' => true,

    // Notifications
    'notifications'              => [
        'channel' => 'database'
    ]
];
