<?php

namespace Civauth\Controller;

use CivAuth\Form\AuthForm;
use CivAuth\Form\Filter;

use Zend\Mvc\controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function loginAction()
    {
        $form = new AuthForm;
        $form->get('submit')->setValue('Login');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new Filter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                $config = $this->getServiceLocator()->get('config');
                $staticSalt = $config['static_salt'];
            }
            
        }
    }
}