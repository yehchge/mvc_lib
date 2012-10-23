<?php

require 'library/jream/autoload.php';
new jream\Autoload('library/jream');

/** A Hash Key for Encryption */
define('HASH_KEY', '83ff9f4e0d16d61727cbdf47d769fb707b652217');

/** Lets always uses a session */
session_start();

/** Init the MVC */
$bootstrap = new jream\mvc\Bootstrap();
$bootstrap->setPathRoot(getcwd());
$bootstrap->setControllerDefault('home');
$bootstrap->init();

define('BASE_URI', $bootstrap->uriSlashPath);


