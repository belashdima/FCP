<?php

class Router
{
    static function showItemsOfCategory($categoryId) {
        require_once 'application/controllers/ItemsController.php';
        (new ItemsController())->showItemsOfCategoryAction($categoryId);
    }

    static function start()
    {
        $chosen = false;

        /*if (strpos($_SERVER['REQUEST_URI'], '/items/') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->create_newAction();
            $chosen = true;
        }*/

        // discounts
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/set?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->setDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/delete?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->deleteDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/add?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->addDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discounts_json') !== false) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->getDiscounts();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discounts') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->showDiscounts();
            $chosen = true;
        }
        //

        // popular categories
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/set') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->setPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/delete') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->deletePopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/add') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->addPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_categories_json') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->getPopularCategories();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_categories') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->showPopularCategories();
            $chosen = true;
        }
        //

        require_once 'application/models/DatabaseHandler.php';
        $categories = (new DatabaseHandler())->getAllCategories();
        foreach ($categories as $category) {
            $urlPart = '/admin/'.$category->getUrlPresentation();
            if (strpos($_SERVER['REQUEST_URI'], $urlPart) !== false && count($_GET) == 0) {
                Router::showItemsOfCategory($category->getId());
                $chosen = true;
            }
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
            self::ErrorPage404();
            return;
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