<?php
/**
 * A simple static call to authorize the users
 */
class Auth
{
    /**
     * Redirect to dashboard if logged
     */
    public static function isLogged()
    {
        $logged_in = self::_loginStatus();
        if ($logged_in == true) {
            header('location: ' . BASE_URI . 'dashboard');
        }
    }
    
    /**
     * Redirect to Home page if not logged
     */
    public static function isNotLogged()
    {
        $logged_in = self::_loginStatus();
        if ($logged_in == false) {
            session_destroy();
            header('location: ' . BASE_URI);
        }
    }
    
    /**
     * Gets the login status
     * 
     * @return boolean
     */
    private static function _loginStatus()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_key'])) {
            return false;
        }

        $enc = jream\Hash::create('sha256', $_SESSION['user_id'], HASH_KEY);
        if ($_SESSION['user_key'] != $enc) {
            return false;
        }
        
        return true;
    }
    
}