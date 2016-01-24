<?php

namespace Civauth\Controller;

use CivAuth\Form\AuthForm;
use CivAuth\Form\Filter;

use Zend\Mvc\controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService;

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
                
                $authService = new AuthenticationService;
                
                $authAdapter = new AuthAdapter();
            }
            
        }
    }
    
    public function registerAction()
    {
        // Create a new form instance.
        $form = new AuthForm();
        $form->get('submit')->setValue('Register');
        
        // Check if request is a POST.
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Check details are valid.
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Register user.
                $data = $form->getData();
                $hash = md5($data['password']);
                file_put_contents('./data/passwd', $hash);
                
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