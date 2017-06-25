<?php

class SRouter
{
    static function start()
    {
        // default controller and action
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //print_r($routes);

        if (strcmp($_SERVER['REQUEST_URI'], '/Footballcity_Project/balls') == 0) {
            include 'application/controllers/SWaresController.php';
            (new SWaresController())->ballsAction();
            return;
        }

        /*
        // get controller name
        if ( !empty($routes[2]) )
        {
            $controllerName = $routes[2];

            //if ($routes[2] == 'balls') {
            //    $controllerName = 'Wares';
            //}
        }

        // get action name
        if ( !empty($routes[3]) )
        {
            $actionName = $routes[3];
        }

        //if ($actionName == 'index' && $routes[2] == 'balls') {
        //    $actionName = 'balls';
        //}

        // add prefixes
        $controllerName = ucfirst($controllerName).'Controller';
        $actionName = explode('.', $actionName)[0];// used to separate from get params
        $actionName = ucfirst($actionName).'Action';


        // pick up controller file
        $controllerFileName = 'S'.$controllerName.'.php';
        $controllerPath = 'application/controllers/'.$controllerFileName;
        if(file_exists($controllerPath))
        {
            include 'application/controllers/'.$controllerFileName;
        }
        else
        {
            echo $controllerPath;
            echo "no file";
            //правильно было бы кинуть здесь исключение,
            //но для упрощения сразу сделаем редирект на страницу 404
            SRouter::ErrorPage404();
        }

        // create controller
        $controllerName = "S".$controllerName;
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
            if(is_numeric($routes[3])) {
                $controller->itemAction($routes[3]);
            } else {
                echo 'no method';
                // здесь также разумнее было бы кинуть исключение
                SRouter::ErrorPage404();
            }
        }*/
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}