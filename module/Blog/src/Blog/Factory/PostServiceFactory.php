<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/16/15
 * Time: 4:43 PM
 */

namespace Blog\Factory;


use Blog\Service\PostService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PostService(
            $serviceLocator->get('Blog\Mapper\PostMapperInterface')
        );
    }
}