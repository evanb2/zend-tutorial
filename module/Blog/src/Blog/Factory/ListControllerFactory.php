<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/16/15
 * Time: 10:21 AM
 */

namespace Blog\Factory;


use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService = $realServiceLocator->get('Blog\Service\PostServiceInterface');

        return new ListController($postService);
    }
}