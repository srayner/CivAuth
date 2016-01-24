<?php

namespace CivAuth\Adapter;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Result;

class FileAdapter extends AbstractAdapter implements AdapterInterface
{
    public function __construct($identity, $credential)
    {
        $this->identity = $identity;
        $this->credential = $credential;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     */
    public function authenticate()
    {
        if ($this->checkCredential()) {
            $code = Result::SUCCESS;
            $identity = null;
            $messages = array('Login ok.');
        } else {
            $code = Result::FAILURE;
            $identity = null;
            $messages = array('Login failed.');
        }
        return new Result($code, $identity, $messages);
    }
    
    private function checkCredential()
    {
        $hash = md5($this->credential);
        $storedHash = file_get_contents('./data/passwd');
        return ($hash === $storedHash);
    }
}