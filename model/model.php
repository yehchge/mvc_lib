<?php

/**
 * We handle models ourselves.
 */
class Model
{
    protected $db;
    
    public function __construct()
    {
        /** A database connection */
//        $this->db = new jream\Database(array(
//            'host' => '127.0.0.1',
//            'name' => 'library-skeleton',
//            'user' => 'root',
//            'pass' => ''
//        ));
    }
    
    /**
     * __call - Error Catcher
     * 
     * @param string $name
     * @param string $arg
     */
    public function __call($name, $arg) 
    {
        die("<div>Model Error: (Method) <b>$name</b> is not defined</div>");
    }
}