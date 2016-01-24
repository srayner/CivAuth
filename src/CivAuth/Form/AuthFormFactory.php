<?php

namespace CivAuth\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new AuthForm();
        $form->setInputFilter(new AuthFilter());
        return $form;
    }   
}