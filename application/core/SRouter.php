<?php

class SRouter
{
    static function showWaresOfType($wareTypeId) {
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

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/boots') !== false) {
            SRouter::showWaresOfType(2);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_boots') !== false) {
            SRouter::showWaresOfType(4);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/indoor_boots') !== false) {
            SRouter::showWaresOfType(5);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/outdoor_boots') !== false) {
            SRouter::showWaresOfType(6);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/balls') !== false) {
            SRouter::showWaresOfType(3);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_balls') !== false) {
            SRouter::showWaresOfType(7);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/futsal_balls') !== false) {
            SRouter::showWaresOfType(8);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_t-shirts') !== false) {
            SRouter::showWaresOfType(23);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_shorts') !== false) {
            SRouter::showWaresOfType(27);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_socks') !== false) {
            SRouter::showWaresOfType(21);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm_tops') !== false) {
            SRouter::showWaresOfType(28);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm_pants') !== false) {
            SRouter::showWaresOfType(29);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/jackets') !== false) {
            SRouter::showWaresOfType(24);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/socks') !== false) {
            SRouter::showWaresOfType(20);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/caps_scarfs') !== false) {
            SRouter::showWaresOfType(30);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/gloves') !== false) {
            SRouter::showWaresOfType(31);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/bags') !== false) {
            SRouter::showWaresOfType(32);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_gloves') !== false) {
            SRouter::showWaresOfType(34);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_jackets') !== false) {
            SRouter::showWaresOfType(33);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_t-shirts') !== false) {
            SRouter::showWaresOfType(36);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_shorts') !== false) {
            SRouter::showWaresOfType(35);
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/shin_pads') !== false) {
            SRouter::showWaresOfType(37);
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/pumps') !== false) {
            SRouter::showWaresOfType(38);
            return;
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

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/index.php') !== false) {
            include 'application/controllers/SMainController.php';
            (new SMainController())->indexAction();
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project') !== false) {
            echo $_SERVER['REQUEST_URI'];
            $url = header($_SERVER['REQUEST_URI']);
            header('Location: '.$url);
            /*include 'application/controllers/SMainController.php';
            (new SMainController())->indexAction();*/
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