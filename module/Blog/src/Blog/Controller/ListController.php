<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/15/15
 * Time: 2:17 PM
 */

namespace Blog\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class ListController extends AbstractActionController
{
    public function indexAction()
    {
        return "Hello World!";
    }
}