<?php

class User_Model extends jream\mvc\Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login($data)
    {
        print_r($data);
    }
}