<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 11:02 AM
 */

namespace Blog\Form;


use Zend\Form\Form;

class PostForm extends Form
{
    public function __construct()
    {
        $this->add([
            'name' => 'post-fieldset',
            'type' => 'Blog\Form\PostFieldset'
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Insert new Post'
            ]
        ]);
    }
}