<?php

class Logout extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * This just logs a user out whenever /logout is hit
     */
    public function index()
    {
        session_destroy();
        header('location: ' . BASE_URI);
    }

}