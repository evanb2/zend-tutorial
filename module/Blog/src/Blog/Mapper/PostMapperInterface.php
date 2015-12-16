<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/16/15
 * Time: 1:47 PM
 */
namespace Blog\Mapper;

use Blog\Model\PostInterface;

interface PostMapperInterface
{
    public function find($id);

    public function findAll();
}