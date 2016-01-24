<?php

namespace CivAuth;

return array(
    'controllers' => array(
        'invokables' => array(
            'CivAuth\Controller\Index' => 'CivAuth\Controller\IndexController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'register' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/register',
                    'defaults' => array(
                        'controller' => 'CivAuth\Controller\Index',
                        'action'     => 'register',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'CivAuth\Controller\Index',
                        'action'     => 'login',
                    ),
                ),
            ),
            'profile' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/profile',
                    'defaults' => array(
                        'controller' => 'CivAuth\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        'controller' => 'CivAuth\Controller\Index',
                        'action'     => 'logout',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'service_manager' => array(
        'invokables' => array(
            'CivAuth\Service' => 'CivAuth\Service\AuthService',
        ),
        'factories' => array(
            'CivAuth\Form' => 'CivAuth\Form\AuthFormFactory',
        )
    ),
    
    'static_salt' => 'fH7K4kDWTk7NFl5G3r3e',
);

