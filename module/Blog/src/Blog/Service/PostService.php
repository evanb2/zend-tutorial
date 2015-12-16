<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/15/15
 * Time: 4:47 PM
 */

namespace Blog\Service;


use Blog\Model\PostInterface;

class PostService implements PostServiceInterface
{

    /**
     * @return array|PostInterface[]
     */
    public function findAllPosts()
    {
        // TODO: Implement findAllPosts() method.
    }

    /**
     * @param int $id
     * @return PostInterface
     */
    public function findPost($id)
    {
        // TODO: Implement findPost() method.
    }
}