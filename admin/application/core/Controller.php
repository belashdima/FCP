<?php

require_once 'View.php';

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function indexAction()
    {
        echo 'default action';
    }
}