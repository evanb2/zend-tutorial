<?php

return [
    'service_manager' => [
        'factories' => [
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
        ],
    ],
    'view_manager'    => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'controllers'     => [
        'factories' => [
            'Blog\Controller\List'   => 'Blog\Factory\ListControllerFactory',
            'Blog\Controller\Write'  => 'Blog\Factory\WriteControllerFactory',
            'Blog\Controller\Delete' => 'Blog\Factory\DeleteControllerFactory',
        ],
    ],
    'router'          => [
        'routes' => [
            'blog' => [
                'type'          => 'literal',
                'options'       => [
                    'route'    => '/blog',
                    'defaults' => [
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => TRUE,
                'child_routes'  => [
                    'detail' => [
                        'type'    => 'segment',
                        'options' => [
                            'route'       => '/:id',
                            'defaults'    => [
                                'action' => 'detail',
                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],
                    'add'    => [
                        'type'    => 'literal',
                        'options' => [
                            'route'    => '/add',
                            'defaults' => [
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'add',
                            ],
                        ],
                    ],
                    'edit'   => [
                        'type'    => 'segment',
                        'options' => [
                            'route'       => '/edit/:id',
                            'defaults'    => [
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'edit',
                            ],
                            'constraints' => [
                                'id' => '\d+',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type'    => 'segment',
                        'options' => [
                            'route'       => '/delete/:id',
                            'defaults'    => [
                                'controller' => 'Blog\Controller\Delete',
                                'action'     => 'delete',
                            ],
                            'constraints' => [
                                'id' => '\d+',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];