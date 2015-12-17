<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 8:06 AM
 */

namespace Blog\Mapper;


use Zend\Db\Adapter\AdapterInterface;

class ZendDbSqlMapper implements PostMapperInterface
{
    protected $dbAdapter;

    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function find($id)
    {

    }

    public function findAll()
    {
        
    }
}