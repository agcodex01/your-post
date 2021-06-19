<?php

class UserRequest
{

    public function __construct($array)
    {
        $this->firstname = $array['firstname'] ?? null;
        $this->lastname = $array['lastname'] ?? null;
        $this->email = $array['email'];
        $this->password = $array['password'];
    }

    public function toArray()
    {
        return [
            'user_type' => 'user',
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function getCredentials()
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
