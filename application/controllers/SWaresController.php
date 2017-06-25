<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SWaresController extends SController
{
    public function ballsAction() {
        //echo 'fvadkslr';
        //$wares = DatabaseHandler::getWares();
        $balls = DatabaseHandler::getWaresOfType(7);
        $this->view->generate('BallsView.php', 'SCommonMarkupView.php', $balls);
    }
}