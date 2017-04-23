<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class BootsController extends Controller
{
    public function indexAction() {
        $this->view->generate('BootsView.php', 'CommonMarkupView.php');
    }
}