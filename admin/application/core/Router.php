<?php

class Router
{
    static function showWaresOfType($wareTypeId) {
        include 'application/controllers/WaresController.php';
        (new WaresController())->showWaresOfTypeAction($wareTypeId);
        return;
    }

    static function start()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/wares') !== false) {
            Router::showWaresOfType(1);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/boots') !== false) {
            Router::showWaresOfType(2);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/football_boots') !== false) {
            Router::showWaresOfType(4);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/indoor_boots') !== false) {
            Router::showWaresOfType(5);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/outdoor_boots') !== false) {
            Router::showWaresOfType(6);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/balls') !== false) {
            Router::showWaresOfType(3);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/football_balls') !== false) {
            Router::showWaresOfType(7);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/futsal_balls') !== false) {
            Router::showWaresOfType(8);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_t-shirts') !== false) {
            Router::showWaresOfType(23);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_shorts') !== false) {
            Router::showWaresOfType(27);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_socks') !== false) {
            Router::showWaresOfType(21);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/warm_tops') !== false) {
            echo 'beetb';
            Router::showWaresOfType(28);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/warm_pants') !== false) {
            Router::showWaresOfType(29);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/jackets') !== false) {
            Router::showWaresOfType(24);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/socks') !== false) {
            Router::showWaresOfType(20);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/caps_scarfs') !== false) {
            Router::showWaresOfType(30);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/gloves') !== false) {
            Router::showWaresOfType(31);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/bags') !== false) {
            Router::showWaresOfType(32);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_gloves') !== false) {
            Router::showWaresOfType(34);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_jackets') !== false) {
            Router::showWaresOfType(33);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_t-shirts') !== false) {
            Router::showWaresOfType(36);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_shorts') !== false) {
            Router::showWaresOfType(35);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/shin_pads') !== false) {
            Router::showWaresOfType(37);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/pumps') !== false) {
            Router::showWaresOfType(38);
        }

        // default controller and action
        /*$controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $routes[4] = explode('?', $routes[4])[0];

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