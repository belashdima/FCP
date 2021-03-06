<?php

class SRouter
{
    static function showWaresOfCategory($categoryId) {
        include 'application/controllers/SItemsController.php';
        (new SItemsController())->categoryAction($categoryId);
        return;
    }

    static function start()
    {
        session_start();
        //session_destroy();

        $_SERVER['REQUEST_URI'];
        if (strcmp($_SERVER['REQUEST_URI'], '/') == 0) {
            include 'application/controllers/SMainController.php';
            (new SMainController())->indexAction();
            return;
        }

        // default controller and action
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (strpos($_SERVER['REQUEST_URI'], '/uploadFile') !== false) {
            include 'application/controllers/SUploadController.php';
            (new SUploadController())->upload();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/basket_add') !== false) {
            include 'application/controllers/SBasketController.php';
            (new SBasketController())->add();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/basket_delete') !== false) {
            include 'application/controllers/SBasketController.php';
            (new SBasketController())->delete();
            return;
        }

        /*if (strpos($_SERVER['REQUEST_URI'], '/session_continue.php') !== false) {
            session_start();
            echo $_SESSION['foo'];
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/sessip') !== false) {
            session_start();
            $_SESSION['foo'] = 'bar'; ?>
            <a href="session_continue.php">session_continue.php</a>
            <?php
            return;
        }*/

        require_once 'admin/application/models/DatabaseHandler.php';
        $categories = (new DatabaseHandler())->getAllCategories();
        //print_r($categories);
        foreach ($categories as $category) {
            $urlPart = '/'.$category->getUrlPresentation();
            if (strpos($_SERVER['REQUEST_URI'], $urlPart) !== false) {
                SRouter::showWaresOfCategory($category->getId());
                return;
            }
        }

        if (strpos($_SERVER['REQUEST_URI'], '/completeOrder') !== false) {
            include 'application/controllers/SBasketController.php';
            (new SBasketController())->completeOrder();
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/getBasket_json') !== false) {
            include 'application/controllers/SBasketController.php';
            (new SBasketController())->getBasket_json();
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/basket') !== false) {
            include 'application/controllers/SBasketController.php';
            (new SBasketController())->showBasket();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/location') !== false) {
            include 'application/controllers/SLocationController.php';
            (new SLocationController())->indexAction();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/item') !== false) {
            include 'application/controllers/SItemsController.php';
            (new SItemsController())->itemAction();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== false) {
            include 'application/controllers/SMainController.php';
            (new SMainController())->indexAction();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project') !== false) {
            //echo $_SERVER['REQUEST_URI'];
            $url = '/Footballcity_Project/index.php';
            //$url = header($_SERVER['REQUEST_URI']);
            header('Location: '.$url);
            include 'application/controllers/SMainController.php';
            (new SMainController())->indexAction();
            return;
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