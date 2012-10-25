<?php

class Dashboard extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::isNotLogged();
    }
    
    /**
     * Display those views!
     */
    public function index()
    {
        $this->view->render('dashboard/inc/header');
        $this->view->render('dashboard/dashboard');
        $this->view->render('dashboard/inc/footer');
    }

}