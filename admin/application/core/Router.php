<?php

class Router
{
    static function showWaresOfType($wareTypeId) {
        require_once 'application/controllers/WaresController.php';
        (new WaresController())->showWaresOfTypeAction($wareTypeId);
    }

    static function start()
    {
        $chosen = false;

        // discounts
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/discount/set?') !== false && !$chosen) {
            require_once 'application/controllers/WaresController.php';
            (new WaresController())->setDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/discount/delete?') !== false && !$chosen) {
            require_once 'application/controllers/WaresController.php';
            (new WaresController())->deleteDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/discount/add?') !== false && !$chosen) {
            require_once 'application/controllers/WaresController.php';
            (new WaresController())->addDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/discounts_json') !== false) {
            require_once 'application/controllers/WaresController.php';
            (new WaresController())->getDiscounts();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/discounts') !== false && !$chosen) {
            require_once 'application/controllers/WaresController.php';
            (new WaresController())->showDiscounts();
            $chosen = true;
        }
        //

        // popular categories
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/popular_category/set') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->setPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/popular_category/delete') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->deletePopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/popular_category/add') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->addPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/popular_categories_json') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->getPopularCategories();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/popular_categories') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->showPopularCategories();
            $chosen = true;
        }
        //

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/wares') !== false && count($_GET) == 0) {
            Router::showWaresOfType(1);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/boots') !== false) {
            Router::showWaresOfType(2);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/football_boots') !== false) {
            Router::showWaresOfType(4);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/indoor_boots') !== false) {
            Router::showWaresOfType(5);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/outdoor_boots') !== false) {
            Router::showWaresOfType(6);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/balls') !== false) {
            Router::showWaresOfType(3);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/football_balls') !== false) {
            Router::showWaresOfType(7);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/futsal_balls') !== false) {
            Router::showWaresOfType(8);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_t-shirts') !== false) {
            Router::showWaresOfType(23);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_shorts') !== false) {
            Router::showWaresOfType(27);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/game_socks') !== false) {
            Router::showWaresOfType(21);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/warm_tops') !== false) {
            Router::showWaresOfType(28);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/warm_pants') !== false) {
            Router::showWaresOfType(29);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/jackets') !== false) {
            Router::showWaresOfType(24);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/socks') !== false) {
            Router::showWaresOfType(20);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/caps_scarfs') !== false) {
            Router::showWaresOfType(30);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/gloves') !== false) {
            Router::showWaresOfType(31);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/bags') !== false) {
            Router::showWaresOfType(32);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_gloves') !== false) {
            Router::showWaresOfType(34);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_jackets') !== false) {
            Router::showWaresOfType(33);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_t-shirts') !== false) {
            Router::showWaresOfType(36);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/goalkeeper_shorts') !== false) {
            Router::showWaresOfType(35);
            $chosen = true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/shin_pads') !== false) {
            Router::showWaresOfType(37);
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/admin/pumps') !== false) {
            Router::showWaresOfType(38);
            $chosen = true;
        }

        if ($chosen) return;

        // default controller and action
        $controllerName = 'Main';
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