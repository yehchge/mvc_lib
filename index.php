<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'library/jream/autoload.php';
new jream\Autoload('library/jream');

// Change this to your folder path, otherwise just use: /
define('BASE_URI', '/library-skeleton/');

// A Hash Key for Encryption 
define('HASH_KEY', '83ff9f4e0d16d61727cbdf47d769fb707b652217');

// Lets always uses a session
session_start();

// For user logins, I'm requiring a custom Authorization class
require_once 'model/auth.php';

// Init the MVC
$bootstrap = new jream\mvc\Bootstrap();
$bootstrap->setPathRoot(getcwd());
$bootstrap->setControllerDefault('home');
$bootstrap->init();


/**
 * Note: For a Live Server you may need:
 * $bootstrap->setPathRoot(getcwd() . '/');
 */




