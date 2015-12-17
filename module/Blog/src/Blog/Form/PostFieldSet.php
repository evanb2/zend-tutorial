<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 10:51 AM
 */

namespace Blog\Form;


use Zend\Form\Fieldset;

class PostFieldSet extends Fieldset
{
    public function __construct()
    {
        $this->add([
            'type' => 'hidden',
            'name' => 'id'
        ]);

        $this->add([
            'type'    => 'text',
            'name'    => 'text',
            'options' => [
                'label' => 'The Text'
            ]
        ]);

        $this->add([
            'type'    => 'text',
            'name'    => 'title',
            'options' => [
                'label' => 'Blog Title'
            ]
        ]);

    }
}