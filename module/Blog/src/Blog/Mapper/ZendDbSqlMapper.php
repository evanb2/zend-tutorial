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
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\HydratorInterface;

class ZendDbSqlMapper implements PostMapperInterface
{
    protected $dbAdapter;

    protected $hydrator;

    protected $postPrototype;

    /**
     * ZendDbSqlMapper constructor.
     * @param AdapterInterface $dbAdapter
     * @param HydratorInterface $hydrator
     * @param PostInterface $postPrototype
     */
    public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator, PostInterface $postPrototype)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->postPrototype = $postPrototype;
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function save(PostInterface $postObject)
    {
        $postData = $this->hydrator->extract($postObject);
        unset($postData['id']);

        if ($postObject->getId()) {
            $action = new Update('posts');
            $action->set($postData);
            $action->where(['id = ?' => $postObject->getId()]);
        } else {
            $action = new Insert('posts');
            $action->values($postData);
        }

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        if ($result instanceof ResultInterface) {
            if ($newId = $result->getGeneratedValue()) {
                $postObject->setId($newId);
            }

            return $postObject;
        }

        throw new \Exception("Database error.");
    }

    /**
     * {@inheritdoc}
     */
    public function delete(PostInterface $postObject)
    {
        $action = new Delete('posts');
        $action->where(['id = ?' => $postObject->getId()]);

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool) $result->getAffectedRows();
    }
}