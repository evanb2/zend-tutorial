<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 9:48 AM
 */

namespace Blog\Factory;


use Blog\Mapper\ZendDbSqlMapper;
use Blog\Model\Post;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ZendDbSqlMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ZendDbSqlMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false),
            new Post()
        );
    }
}