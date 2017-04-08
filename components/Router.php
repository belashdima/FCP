<?php

class Router {

    /*public $a = "a variable";
    public $b = 2;*/

    private $routes;

    public function __construct()
    {
        $this->routes = require_once ('config/routes.php');
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    public function run() {

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPattern -> $path";

            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $path);

                /*echo "<pre>";
                print_r($segments);
                echo "</pre>";*/

                $controllerName = array_shift($segments)."Controller";
                $controllerName = ucfirst($controllerName);

                $actionName = array_shift($segments);
                $actionName = "action".ucfirst($actionName);

                /*echo $controllerName;
                echo "<br>";
                echo $actionName;*/

                // connect controller file

                $controllerFileName = ROOT."/controllers/".$controllerName.".php";

                if (file_exists($controllerFileName)) {
                    require_once ($controllerFileName);
                }

                $controllerObject = new $controllerName;

                $result = $controllerObject->$actionName();
                if ($result != null) {
                    break;
                }
            }
        }
    }

    private function getURI() {
        // get query string
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
        }

        return substr($uri, 21, strlen($uri) );
    }
}