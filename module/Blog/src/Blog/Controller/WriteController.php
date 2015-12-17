<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 11:14 AM
 */

namespace Blog\Controller;


use Blog\Service\PostServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;

class WriteController extends AbstractActionController
{
    protected $postService;

    protected $postForm;

    /**
     * WriteController constructor.
     * @param PostServiceInterface $postService
     * @param FormInterface $postForm
     * @internal param $postInsertForm
     */
    public function __construct(PostServiceInterface $postService, FormInterface $postForm)
    {
        $this->postService = $postService;
        $this->postForm    = $postForm;
    }

    public function addAction()
    {
        //
    }
}