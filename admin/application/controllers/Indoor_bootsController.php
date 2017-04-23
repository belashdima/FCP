<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class Indoor_bootsController extends Controller
{
    public function indexAction() {
        $this->listAction();
    }

    public function listAction() {
        $this->view->generate('Indoor_bootsView.php', 'CommonMarkupView.php');
    }
}