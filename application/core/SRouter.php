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

        if (strpos($_SERVER['REQUEST_URI'], '/boots') !== false) {
            SRouter::showWaresOfCategory(2);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/football_boots') !== false) {
            SRouter::showWaresOfCategory(4);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/indoor_boots') !== false) {
            SRouter::showWaresOfCategory(5);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/outdoor_boots') !== false) {
            SRouter::showWaresOfCategory(6);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/balls') !== false) {
            SRouter::showWaresOfCategory(3);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/football_balls') !== false) {
            SRouter::showWaresOfCategory(7);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/futsal_balls') !== false) {
            SRouter::showWaresOfCategory(8);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/game_t-shirts') !== false) {
            SRouter::showWaresOfCategory(23);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/game_shorts') !== false) {
            SRouter::showWaresOfCategory(27);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/game_socks') !== false) {
            SRouter::showWaresOfCategory(21);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/warm_tops') !== false) {
            SRouter::showWaresOfCategory(28);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/warm_pants') !== false) {
            SRouter::showWaresOfCategory(29);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/jackets') !== false) {
            SRouter::showWaresOfCategory(24);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/socks') !== false) {
            SRouter::showWaresOfCategory(20);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/caps_scarfs') !== false) {
            SRouter::showWaresOfCategory(30);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/gloves') !== false) {
            SRouter::showWaresOfCategory(31);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/bags') !== false) {
            SRouter::showWaresOfCategory(32);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/goalkeeper_gloves') !== false) {
            SRouter::showWaresOfCategory(34);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/goalkeeper_jackets') !== false) {
            SRouter::showWaresOfCategory(33);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/goalkeeper_t-shirts') !== false) {
            SRouter::showWaresOfCategory(36);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/goalkeeper_shorts') !== false) {
            SRouter::showWaresOfCategory(35);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/shin_pads') !== false) {
            SRouter::showWaresOfCategory(37);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/pumps') !== false) {
            SRouter::showWaresOfCategory(38);
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
            $url = header($_SERVER['REQUEST_URI']);
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