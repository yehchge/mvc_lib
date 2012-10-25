<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Attempt to log the user in.
     * 
     * @param   array   $data   From the Input class returned array
     * @return  integer userid
     */
    public function login($data)
    {
        $result = $this->db->select("
            SELECT  user_id
            FROM    user
            WHERE   email = :email
            AND     password = :password
        ", array(
            'email' => $data['email'],
            'password' => $data['password']
        ));
        
        if (!empty($result)) {
            return $result[0]['user_id'];
        }
        return false;
    }

}