<?php

class Login extends jream\mvc\Controller
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
        $this->view->render('login/login');        
        $this->view->render('inc/footer');
    }
    
    /**
     * Submits the login form.
     * I am using the Input class to force requirements and validate.
     */
    public function submit()
    {
        try {
            $input = new \jream\Input();
            $input  ->post('email', true)
                        ->validate('email')
                    ->post('password', true)
                        ->format('hash', array('sha256', HASH_KEY));
            $input  ->submit();

            // If the form has no errors, lets try the 
            // model and check if its a real user!
            $user_model = $this->loadModel('user');
            $result = $user_model->login($input->fetch());
            
            if ($result == false) {
                jream\Output::error(["No user found"]);
            } else {
                $_SESSION['user_id'] = $result;
                $_SESSION['user_key'] = jream\Hash::create('sha256', $result, HASH_KEY);
                
                // When we output success, I set jQuery in the view
                // which does a window.location.href redirect
                jream\Output::success();
            }
            
        } catch (Exception $e) {
            // This will output our precious form errors
            jream\Output::error($input->fetchErrors());
        }
    }

}