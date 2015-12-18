<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/15/15
 * Time: 4:41 PM
 */

namespace Blog\Service;

use Blog\Model\PostInterface;

interface PostServiceInterface
{
    /**
     * @return array|PostInterface[]
     */
    public function findAllPosts();

    /**
     * @param int $id
     * @return PostInterface
     */
    public function findPost($id);

    /**
     * @param PostInterface $post
     * @return PostInterface
     */
    public function savePost(PostInterface $post);

    /**
     * @param PostInterface $post
     * @return bool
     */
    public function deletePost(PostInterface $post);
}