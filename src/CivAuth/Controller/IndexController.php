<?php

namespace Civauth\Controller;

use Zend\Mvc\controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function loginAction()
    {
        // Create a new form instance.
        $form = $this->getServiceLocator()->get('CivAuth\Form');
        $form->get('submit')->setValue('Login');
        $message = null;
        
        // Check if request is a POST.
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Check details are valid.
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Attempt login.
                $data = $form->getData();
                $service = $this->getServiceLocator()->get('CivAuth\Service');
                if ($service->login($data)) {
                    // Redirect to user profile (only if successfull).
                    $this->redirect()->toRoute('profile');
                } else {
                    $message = 'Authentication failed.';
                }
            }
        }
        
        // Render or re-render the form.
        return new ViewModel(array(
            'form' => $form,
            'message' => $message
        ));
    }
    
    public function registerAction()
    {
        // Create a new form instance.
        $form = $this->getServiceLocator()->get('CivAuth\Form');
        $form->get('submit')->setValue('Register');
        
        // Check if request is a POST.
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Check details are valid.
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Register user.
                $data = $form->getData();
                $this->getServiceLocator()->get('CivAuth\Service')->register($data);
                
                // Redirect to user profile.
                $this->redirect()->toRoute('profile');
            }
        }
        
        // Render or re-render the form.
        return new ViewModel(array(
            'form' => $form
        ));
    }
}