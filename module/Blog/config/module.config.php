<?php

return [
    'controllers' => [
        'invokables' => [
            'Blog\Controller\List' => 'Blog\Controller\ListController'
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