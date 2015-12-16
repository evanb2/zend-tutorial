<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/15/15
 * Time: 4:50 PM
 */

namespace Blog\Model;

interface PostInterface
{
    /**
     * Will return the ID of the blog post
     *
     * @return int
     */
    public function getId();

    /**
     * Will return the TITLE of the blog post
     *
     * @return string
     */
    public function getTitle();

    /**
     * Will return the TEXT of the blog post
     *
     * @return string
     */
    public function getText();
}