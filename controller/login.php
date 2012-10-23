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
            $input  ->post('email', true)
                        ->validate('email')
                    ->post('password', true)
                        ->format('hash', array('sha256', HASH_KEY));
            $input  ->submit();

            $user_model = $this->loadModel('user');
            $result = $user_model->login($input->fetch());
            
            if ($result == false) {
                jream\Output::error("No user found");
            } else {
                $_SESSION['user_id'] = $result;
                $_SESSION['user_key'] = jream\Hash::create('sha256', $result, HASH_KEY);
                jream\Output::success();
            }
            
            
        } catch (Exception $e) {
            jream\Output::error($input->fetchErrors());
        }
    }

}