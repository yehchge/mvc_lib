<?php

class Dashboard extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view->render('dashboard/inc/header');
        $this->view->render('dashboard/dashboard');
        $this->view->render('dashboard/inc/footer');
    }

}