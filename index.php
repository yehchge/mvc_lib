<?php

require 'library/jream/autoload.php';

new jream\Autoload('library/jream');

/** Init the MVC */
$bootstrap = new jream\mvc\Bootstrap();
$bootstrap->setPathRoot(getcwd());
$bootstrap->setControllerDefault('home');
$bootstrap->init();

define('BASE_URI', $bootstrap->uriSlashPath);


$config = array();
$config['db'] = array(
    'host' => '127.0.0.1',
    'name' => 'jreamy',
    'user' => 'root',
    'pass' => ''
);

