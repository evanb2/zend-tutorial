<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 8:06 AM
 */

namespace Blog\Mapper;


use Blog\Model\Post;
use Blog\Model\PostInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\HydratorInterface;

class ZendDbSqlMapper implements PostMapperInterface
{
    protected $dbAdapter;

    protected $hydrator;

    protected $postPrototype;

    public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator, PostInterface $postPrototype)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function find($id)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('posts');
        $select->where(['id = ?' => $id]);

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(), $this->postPrototype);
        }

        throw new \InvalidArgumentException("Blog with given ID:{$id} not found.");
    }

    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('posts');

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ClassMethods(), new Post());

            return $resultSet->initialize($result);
        }

        return [];
    }

}