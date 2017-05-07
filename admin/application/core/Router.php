<?php

class Router
{
    static function start()
    {
        // default controller and action
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //print_r($routes);

        // get controller name
        if ( !empty($routes[3]) )
        {
            $controllerName = $routes[3];
        }

        // get action name
        if ( !empty($routes[4]) )
        {
            $actionName = $routes[4];
        }

        // add prefixes
        $modelName = 'BootsModel' .ucfirst($controllerName);
        $controllerName = ucfirst($controllerName).'Controller';
        $actionName = explode('.', $actionName)[0];// used to separate from get params
        $actionName = ucfirst($actionName).'Action';

        // pick up model file (can not exist)

        /*$modelFileName = $modelName.'.php';
        $modelPath = ROOT.'/application/models/'.$modelFileName;
        if(file_exists($modelPath))
        {
            ROOT.'/application/models/'.$modelFileName;
        }*/

        // pick up controller file
        $controllerFileName = $controllerName.'.php';
        $controllerPath = 'application/controllers/'.$controllerFileName;
        if(file_exists($controllerPath))
        {
            include 'application/controllers/'.$controllerFileName;
        }
        else
        {
            echo "no file";
            //правильно было бы кинуть здесь исключение,
            //но для упрощения сразу сделаем редирект на страницу 404
            Router::ErrorPage404();
        }

        // create controller
        $controller = new $controllerName;
        $action = lcfirst($actionName);

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            //echo $routes[4];
            if(is_numeric($routes[4])) {
                $controller->itemAction($routes[4]);
            } else {
                echo 'no method';
                // здесь также разумнее было бы кинуть исключение
                Router::ErrorPage404();
            }
        }
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}