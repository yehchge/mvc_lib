<?php

class Logout extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        session_destroy();
        header('location: /');
    }

}