<?php

/**
 * We handle models ourselves.
 */
class Model
{
    protected $db;
    
    /**
     * Init anything we need in the models,
     * I always like a database connection
     */
    public function __construct()
    {
        /** A database connection */
        $this->db = new jream\Database(array(
            'type' => 'mysql',
            'host' => 'localhost',
            'name' => 'library-skeleton',
            'user' => 'robot',
            'pass' => 'robot'
        ));
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