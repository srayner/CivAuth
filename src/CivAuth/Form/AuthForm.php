<?php

namespace CivAuth\Form;

use Zend\Form\Form;

class AuthForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('auth');
        $this->setAttributes(array(
            'method' => 'post',
            'class' => 'form'
        ));
        $this->addElements();
    }
    
    private function addElements()
    {
        // Username input
        $this->add(array(
           'name' => 'username',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'password-input',
            ),
            'options' => array(
                'label' => 'Username',
            ),
        ));
        
        // Password input
        $this->add(array(
           'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'id' => 'password-input',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        
        // Submit button.
        $this->add(array(
           'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-primary',
                'id' => 'submitbutton',
            ),
        ));
    }
}
