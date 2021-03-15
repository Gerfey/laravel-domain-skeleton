<?php

return [
    [
        'name' => 'Database',
        'type' => 'dir',
        'children' => [
            [
                'name' => 'Migrations',
                'type' => 'dir',
                'children' => []
            ],
            [
                'name' => 'Models',
                'type' => 'dir',
                'children' => [
                    [
                        'name' => '_DomainName_.php',
                        'type' => 'file',
                        'template' => 'Model'
                    ]
                ]
            ],
            [
                'name' => 'Repository',
                'type' => 'dir',
                'children' => [
                    [
                        'name' => '_DomainName_Repository.php',
                        'type' => 'file',
                        'template' => 'Repository'
                    ]
                ]
            ]
        ]
    ],
    [
        'name' => 'Http',
        'type' => 'dir',
        'children' => [
            [
                'name' => 'Controller',
                'type' => 'dir',
                'children' => [
                    [
                        'name' => '_DomainName_Controller.php',
                        'type' => 'file',
                        'template' => 'Controller'
                    ]
                ]
            ],
            [
                'name' => 'Middleware',
                'type' => 'dir',
                'children' => []
            ],
            [
                'name' => 'Requests',
                'type' => 'dir',
                'children' => []
            ]
        ]
    ],
    [
        'name' => 'Routes',
        'type' => 'dir',
        'children' => [
            [
                'name' => 'api.php',
                'type' => 'file',
                'template' => 'Api'
            ]
        ]
    ],
    [
        'name' => '_DomainName_ServicesProvider.php',
        'type' => 'file',
        'template' => 'ServicesProvider'
    ]
];
