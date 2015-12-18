<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/15/15
 * Time: 4:47 PM
 */

namespace Blog\Service;

use Blog\Mapper\PostMapperInterface;
use Blog\Model\PostInterface;

class PostService implements PostServiceInterface
{
    /**
     * @var \Blog\Mapper\PostMapperInterface
     */
    protected $postMapper;

    /**
     * PostService constructor.
     * @param PostMapperInterface $postMapper
     */
    public function __construct(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
    }

    /**
     * @return array|PostInterface[]
     */
    public function findAllPosts()
    {
        return $this->postMapper->findAll();
    }

    /**
     * @param int $id
     * @return PostInterface
     */
    public function findPost($id)
    {
        return $this->postMapper->find($id);
    }

    public function savePost(PostInterface $post)
    {
        return $this->postMapper->save($post);
    }
}