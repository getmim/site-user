<?php

return [
    '__name' => 'site-user',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/site-user.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'app/site-user' => ['install','remove'],
        'modules/site-user' => ['install','update','remove'],
        'theme/site/user' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteUser\\Controller' => [
                'type' => 'file',
                'base' => 'app/site-user/controller'
            ],
            'SiteUser\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-user/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteUserMe' => [
                'path' => [
                    'value' => '/me'
                ],
                'handler' => 'SiteUser\\Controller\\User::me',
                'method' => 'GET',
                'modules' => [
                    'site-user-login' => true 
                ]
            ],
            'siteUserProfile' => [
                'path' => [
                    'value' => '/user/(:name)',
                    'params' => [
                        'name' => 'slug'
                    ]
                ],
                'handler' => 'SiteUser\\Controller\\User::single',
                'method' => 'GET'
            ]
        ]
    ]
];