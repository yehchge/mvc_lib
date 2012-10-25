<?php

class Home extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::isLogged();
    }
    
    /**
     * Display those views!
     */
    public function index()
    {
        $this->view->render('inc/header');
        $this->view->render('home/home');
        $this->view->render('inc/footer');
    }

}