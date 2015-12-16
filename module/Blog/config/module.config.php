<?php

return [
    'service_manager' => [
        'invokables' => [
            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'controllers' => [
        'factories' => [
            'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
        ]
    ],
    'router' => [
        'routes' => [
            'post' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/blog',
                    'defaults' => [
                        'controller' => 'Blog\Controller\List',
                        'action' => 'index',
                    ]
                ]
            ]
        ]
    ]
];