<?php

require_once 'SView.php';

class SController
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new SView();
    }

    function indexAction()
    {
        echo 'default action';
    }
}