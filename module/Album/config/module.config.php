<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/5/15
 * Time: 6:48 PM
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);