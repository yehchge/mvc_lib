<?php

class Index extends jream\MVC\Controller
{

	public function __construct()
	{
		echo __CLASS__ . ' Constructed' . "\n"; 
		parent::__construct();
	}
	
	public function index()
	{
		echo __FUNCTION__ . ' Called' . "\n";
		$this->view->render('header');
		$this->view->render('index');
		$this->view->render('footer');
	}
	
	public function argtest($arg1, $arg2)
	{
		echo __CLASS__ . "->" . __FUNCTION__ . " - " . $arg1 . "\n";
		echo __CLASS__ . "->" . __FUNCTION__ . " - " . $arg2 . "\n";
	}

	public function test()
	{
		$model = $this->loadModel('index');
		$model->test();
	}
	
	public function viewtest()
	{
		// not ready yet..
	}
}