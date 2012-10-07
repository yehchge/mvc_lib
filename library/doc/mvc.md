#### JREAM Library
* * *

# jream/mvc
This is a minimalistic MVC system whereby you have plenty of freedom.


### Default Folder Structure

    /controller
    /model
    /view
	/library
		/jream (Source)
    .htaccess
    index.php
    
    

###  .htaccess

To rewrite URL's enable `mod_rewrite` if you are using Apache. If you are working in a subfolder, make sure to change the `RewriteBase`.

    RewriteEngine On
	RewriteBase /
	RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.+)$ index.php?uri=$1 [QSA,L]



### Index.php

You can load up the MVC in 5 lines of code, or you can configure a few extra settings for custom folders.

	<?php
	require_once 'library/jream/autoload.php';
	new jream\Autoload('library/jream');
		
	/** Init MVC */
	$bootstrap = new jream\MVC\Bootstrap();
	
	$bootstrap->setPathRoot(getcwd());
	
	/** start:Optional */
	$bootstrap->setPathController('controller/');
	$bootstrap->setPathModel('model/');
	$bootstrap->setPathView('view/');
	$bootstrap->setControllerDefault('index');
	/** end:Optional */

	$bootstrap->init();
	
### /controller/index.php

Setup the default controller. In the user method we pass an argument, to access that URL visit: `localhost/index/user/5` and the `5` will be in place of the `$id`.

	<?php
	class Index extends jream\MVC\Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->view->render('index', array(
				'data' => 'This is passing data to a view!'
			));
		}

		public function user($id)
		{
			$user = $this->loadModel('user');
			$this->view->render('index', array(
				'data' => $user->test($id)
			));
		}
	}
	
### /model/index_model.php

Setup a base model wherever you decide to place your models. This is what
all of your other models will extend. The reason to do this is to setup a
model any way you like.

	<?php
	class Model
	{
	}

### /view/index.php

Setup  a sample view and echo out the view data.

	<html>
	<body>

	<?php if (isset($this->data)) echo $this->data;?>

	</body>
	</html>

### You are Finished
Congratulations, you have finished. Can you create another controller and get to it's URL? Try it!

* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)