<?php

return [
//    'db' => [
//        'driver'         => 'Pdo',
//        'username'       => 'zend',
//        'password'       => '1234',
//        'dns'            => 'mysql:dbname=zend-tutorial;host=localhost',
//        'driver_options' => [
//            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
//        ]
//    ],
    'service_manager' => [
        'factories' => [
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory'
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
                'type'    => 'literal',
                'options' => [
                    'route'    => '/blog',
                    'defaults' => [
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    ]
                ]
            ]
        ]
    ]
];