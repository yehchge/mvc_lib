<?php

class Login extends jream\mvc\Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view->render('inc/header');
        $this->view->render('login/login');        
        $this->view->render('inc/footer');
    }
    
    public function submit()
    {
        try {
            $input = new \jream\Input();
            $input  ->post('email')
                        ->validate('email')
                    ->post('password')
                        ->format('hash', 'sha256');
            $input  ->submit();

            $user_model = $this->loadModel('user');
            $user_model->login($input->fetch());
            
            // set session here
            jream\Output::success();
            
        } catch (Exception $e) {
            jream\Output::error($input->fetchErrors());
        }
    }

}