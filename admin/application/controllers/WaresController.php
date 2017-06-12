<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class WaresController extends Controller
{
    public function indexAction() {
        $this->view->generate('WaresView.php', 'CommonMarkupView.php');
    }
}