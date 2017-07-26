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
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_boots') !== false) {
            SRouter::showWaresOfType(4);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/indoor_boots') !== false) {
            SRouter::showWaresOfType(5);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/outdoor_boots') !== false) {
            SRouter::showWaresOfType(6);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/balls') !== false) {
            SRouter::showWaresOfType(3);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/football_balls') !== false) {
            SRouter::showWaresOfType(7);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/futsal_balls') !== false) {
            SRouter::showWaresOfType(8);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_t-shirts') !== false) {
            SRouter::showWaresOfType(23);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_shorts') !== false) {
            SRouter::showWaresOfType(27);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/game_socks') !== false) {
            SRouter::showWaresOfType(21);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm_tops') !== false) {
            SRouter::showWaresOfType(28);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/warm_pants') !== false) {
            SRouter::showWaresOfType(29);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/jackets') !== false) {
            SRouter::showWaresOfType(24);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/socks') !== false) {
            SRouter::showWaresOfType(20);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/caps_scarfs') !== false) {
            SRouter::showWaresOfType(30);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/gloves') !== false) {
            SRouter::showWaresOfType(31);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/bags') !== false) {
            SRouter::showWaresOfType(32);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_gloves') !== false) {
            SRouter::showWaresOfType(34);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_jackets') !== false) {
            SRouter::showWaresOfType(33);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_t-shirts') !== false) {
            SRouter::showWaresOfType(36);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/goalkeeper_shorts') !== false) {
            SRouter::showWaresOfType(35);
        }

        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/shin_pads') !== false) {
            SRouter::showWaresOfType(37);
        }
        if (strpos($_SERVER['REQUEST_URI'], '/Footballcity_Project/pumps') !== false) {
            SRouter::showWaresOfType(38);
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