<?php

namespace CivAuth\Service;

class AuthService
{
    public function register(array $data)
    {
        $hash = md5($data['password']);
        file_put_contents('./data/passwd', $hash);
    }
}
