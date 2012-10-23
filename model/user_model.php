<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login($data)
    {
        $r = $this->db->select("
            SELECT  user_id
            FROM    user
            WHERE   email = :email
            AND     password = :password
        ", array(
            'email' => $data['email'],
            'password' => $data['password']
        ));
        
        if (!empty($r)) {
            return $r[0]['user_id'];
        }
        return false;
    }
    
    public function authenticate()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_key']))
        {
            session_destroy();
            header('location: /');
        }
        
        $enc = jream\Hash::create('sha256', $_SESSION['user_id'], HASH_KEY);
        if ($_SESSION['user_id'] != $enc) {
            session_destroy();
            header('location: /');
        }
    }
}