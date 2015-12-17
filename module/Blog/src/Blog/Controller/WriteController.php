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
use Zend\View\Model\ViewModel;

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
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->postForm->setData($request->getPost());

            if ($this->postForm->isValid()) {
                try {
                    $this->postService->savePost($this->postForm->getData());

                    return $this->redirect()->toRoute('blog');
                } catch (\Exception $ex) {
                    //DB error
                }
            }
        }

        return new ViewModel([
            'form' => $this->postForm
        ]);
    }
}