<?php

class SRouter
{
    static function showWareType($wareTypeId) {
        include 'application/controllers/SWaresController.php';
        (new SWaresController())->ware_typeAction($wareTypeId);
        return;
    }

    static function start()
    {
        // default controller and action
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //print_r($routes);

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/boots') !== false) {
            SRouter::showWareType(2);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_boots') !== false) {
            SRouter::showWareType(4);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/indoor_boots') !== false) {
            SRouter::showWareType(5);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/outdoor_boots') !== false) {
            SRouter::showWareType(6);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/balls') !== false) {
            SRouter::showWareType(3);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_balls') !== false) {
            SRouter::showWareType(7);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/futsal_balls') !== false) {
            SRouter::showWareType(8);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game-t-shirts') !== false) {
            SRouter::showWareType(23);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game-shorts') !== false) {
            SRouter::showWareType(27);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game-socks') !== false) {
            SRouter::showWareType(21);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm-tops') !== false) {
            SRouter::showWareType(28);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm-pants') !== false) {
            SRouter::showWareType(29);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/jackets') !== false) {
            SRouter::showWareType(24);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/socks') !== false) {
            SRouter::showWareType(20);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/caps_scarfs') !== false) {
            SRouter::showWareType(30);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/gloves') !== false) {
            SRouter::showWareType(31);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/bags') !== false) {
            SRouter::showWareType(32);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_gloves') !== false) {
            SRouter::showWareType(34);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_jackets') !== false) {
            SRouter::showWareType(33);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_t-shirts') !== false) {
            SRouter::showWareType(36);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_shorts') !== false) {
            SRouter::showWareType(35);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/shin_pads') !== false) {
            SRouter::showWareType(37);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/pumps') !== false) {
            SRouter::showWareType(38);
        }

        if (strcmp($_SERVER['REQUEST_URI'], '/Footballcity_Project/location') == 0) {
            include 'application/controllers/SLocationController.php';
            (new SLocationController())->indexAction();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/ware') !== false) {
            include 'application/controllers/SWaresController.php';
            (new SWaresController())->wareAction();
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