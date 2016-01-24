<?php

namespace CivAuth\Service;

use CivAuth\Adapter\FileAdapter as Adapter;
use Zend\Authentication\Result;

class AuthService
{
    public function register(array $data)
    {
        $hash = md5($data['password']);
        file_put_contents('./data/passwd', $hash);
    }
    
    public function login(array $data)
    {
        $adapter = new Adapter($data['username'], $data['password']);
        $result = $adapter->authenticate();
        if ($result->getCode() == Result::SUCCESS) {
            return true;
        }
        return false;
    }
}
