<?php
/**
 * @author      Jesse Boyer <contact@jream.com>
 * @copyright   Copyright (C), 2011-12 Jesse Boyer
 * @license     GNU General Public License 3 (http://www.gnu.org/licenses/)
 *              Refer to the LICENSE file distributed within the package.
 *
 * @link        http://jream.com
 *  
 * @usage
 *     $bootstrap = new Bootstrap();
 *  // For a local copy:
 *     $bootstrap->setPathRoot(getcwd());
 
 *  // For a live copy
 *     $bootstrap->setPathRoot('/' . getcwd());
 * 
 *     $bootstrap->setPathController('controller/');
 *     $bootstrap->setPathModel('model/');
 *    $bootstrap->setPathView('view/');
 *     $bootstrap->setControllerDefault('home');
 *     $bootstrap->init();
 * 
 */
namespace jream\mvc;

class Bootstrap 
{

    /**
     * @var string $_controllerDefault The default controller to load
     */
    private $_controllerDefault = 'index';
    
    /**
     * @var string $_uriController The controller to call
     */
    private $_uriController;
    
    /**
     * @var string $_uriMethod The method call
     */
    private $_uriMethod;
    
    /**
     * @var array $this->_uriValue Values beyond the controller/method
     */
    private $_uriValue = array();
    
    /**
     * @var string $_pathModel Where the models are located
     */
    private $_pathModel;
    
    /**
     * @var string $_pathView Where the views are located
     */
    private $_pathView;
    
    /**
     * @var string $_pathController Where the controllers are located
     */
    private $_pathController;
    
    /**
     * @var object $_basePath The basepath to include files from
     */ 
    private $_basePath;

    /**
     * @var string $uri The URI string
     */
    public $uri;
    
    /**
     * @var array $uriSegments Each URI segment in an array
     */
    public $uriSegments;
    
    /**
     * @var string $downPath The ../ path count
     */
    public $uriSlashPath;

    /**
     * @var object $_view The view object 
     */
    private $_view;

    /**
     * __construct - Get the URL and prepare the internal data
     * 
     * This is prepared so a route check can happen before things are initialized
     */
    public function __construct()
    {
        if (isset($_GET['uri']))
        {
            /** Prevent the slash from breaking the array below */
            $uri = rtrim($_GET['uri'], '/');
            
            /** Prevent a null-byte from going through */
            $uri = filter_var($uri, FILTER_SANITIZE_URL);
        }
        /** Set the string URI */
        $this->uri = (isset($uri)) ? $uri : '';
    }
    
    /** 
     * init - Initializes the bootstrap handler once ready
     * 
     * @param boolean|string $overrideUri 
     */
    public function init($overrideUri = false) 
    {
        if (!isset($this->_pathRoot)) 
        die('You must run setPathRoot($path)');

        /** When a route overrides a URI we build the path here */
        $urlToBuild = ($overrideUri == true) ? $overrideUri : $this->uri;
        $this->_buildComponents($urlToBuild);
        
        /** The order of these are important */
        $this->_initController();
    }
    
    /**
     * _buildComponents - Sets up the pieces for the Controller, Model, Value
     * 
     * @param string $uri 
     */
    private function _buildComponents($uri)
    {
        /** Break up the URL */
        $uri = explode('/', $uri);
        
        /** Store the segments */
        $this->uriSegments = $uri;
        
        $this->_initUriSlashPath($uri);
        
        
        /** Grab Controller and Optional Method */
        $this->_uriController = ucwords($uri[0]); // Make sure its matches naming ie: Index_Controller
        $this->_uriMethod = (isset($uri[1])) ? strtolower($uri[1]) : NULL;

        /** Grab the urlValues beyond the point of controller/method/ */
        $this->_uriValue = array_splice($uri, 2);
        
        /** Default the controller if one is not set in the URL */
        if (!isset($this->_uriController) || empty($this->_uriController))
        $this->_uriController = $this->_controllerDefault;
    }
    
    /**
     * setPathBase - Required
     * 
     * @param type $path Location of the root path
     */
    public function setPathRoot($path)
    {
        $this->_pathRoot = rtrim($path, '/') . '/';
        
        /**
         * Set the default paths afterwards
         */
        $this->_pathController = $this->_pathRoot . 'controller/';
        $this->_pathModel = $this->_pathRoot . 'model/';
        $this->_pathView = $this->_pathRoot . 'view/';
    }
    
    /**
     * setPathController - Default is 'controller/'
     *
     * @param string $path Location for the controllers
     */
    public function setPathController($path)
    {
        $this->_pathController = $this->_pathRoot . trim($path, '/') . '/';
    }
    
    /**
     * setPathModel - Default is 'model/'
     *
     * @param string $path Location for the models
     */
    public function setPathModel($path)
    {
        $this->_pathModel = $this->_pathRoot . trim($path, '/') . '/';
    }
    
    /**
     * setPathView - Default is 'view/'
     *
     * @param string $path Location for the models
     */
    public function setPathView($path)
    {
        $this->_pathView = $this->_pathRoot . trim($path, '/') . '/';
    }
    
    /**
     * setControllerDefault - The default controller to load when nothing is passed
     *
     * @param string $controller Name of the controller
     */
    public function setControllerDefault($controller)
    {
        $this->_controllerDefault = strtolower($controller);
    }
    
    /**
     * _initUriSlashPath - Sets up the dot dot slash path length
     */
    private function _initUriSlashPath()
    {
        /** Create the "../" path for convenience */
        $this->uriSlashPath = '';
        
        /** The real segments (Not the overriden one) */
        $realSegments = explode('/', $this->uri);
        
        for ($i = 1; $i < count($realSegments); $i++) 
        {
            $this->uriSlashPath .= '../';
        }
    }
    
    /** 
     * _initController - Load the controller based on the URL 
     */
    private function _initController() 
    {
        /** The user must create this class */
        $this->_requireCustomModel();
        
        /** Make sure the actual controller exists */
        if (file_exists($this->_pathController . strtolower($this->_uriController) . '.php')) 
        {
            /** Include the controller and instantiate it */
            require $this->_pathController . strtolower($this->_uriController) . '.php';
            
            $controller = $this->_uriController;
            
            $this->controller = new $controller();
            
            /** I need the model path inside the controller to run controller->loadModel() */
            $this->controller->pathModel = $this->_pathModel;
            $this->controller->view = new View();
            $this->controller->view->setPath($this->_pathView);
		
            /** Check if a method is in the URL */
            if (isset($this->_uriMethod))
            {
                /** First check if a Value is passed, incase it goes into a method */
                if (!empty($this->_uriValue))
                {
                    switch (count($this->_uriValue))
                    {
                        case 1:
                        $this->controller->{$this->_uriMethod}($this->_uriValue[0]);
                        break;
                    
                        case 2:
                        $this->controller->{$this->_uriMethod}($this->_uriValue[0], $this->_uriValue[1]);
                        break;
                            
                        case 3:
                        $this->controller->{$this->_uriMethod}($this->_uriValue[0], $this->_uriValue[1], $this->_uriValue[2]);
                        break;
                    
                        case 4:
                        $this->controller->{$this->_uriMethod}($this->_uriValue[0], $this->_uriValue[1], $this->_uriValue[2], $this->_uriValue[3]);
                        break;
                    
                        case 5:
                        $this->controller->{$this->_uriMethod}($this->_uriValue[0], $this->_uriValue[1], $this->_uriValue[2], $this->_uriValue[3], $this->_uriValue[4]);
                        break;
                    }
                }
                
                /** Otherwise only load the method with no arguments */
                else
                $this->controller->{$this->_uriMethod}();
            }
            else {
                /** Revert to the default controller's main function */
                $this->controller->index();
            }
        }
        else 
        {
            die(__CLASS__ . ': error (non-existant controller): ' . $this->_uriController);
        }
    }  
    
    private function _requireCustomModel()
    {
        if (!file_exists($this->_pathModel . 'model.php'))
        {
            die(__CLASS__ . ": error (missing model)\n
                You must create your base model here: {$this->_pathModel}model.php\n
                <pre>
                &lt;?php\n
                class Model {}
                </pre>
            ");
        }

        require $this->_pathModel . 'model.php';
    }
    
}