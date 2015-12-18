<?php
/**
 * Created by PhpStorm.
 * User: evanbutler
 * Date: 12/17/15
 * Time: 10:51 AM
 */

namespace Blog\Form;


use Blog\Model\Post;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class PostFieldSet extends Fieldset
{
    public function __construct($name = NULL, $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods(FALSE));
        $this->setObject(new Post());

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