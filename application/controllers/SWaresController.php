<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SWaresController extends SController
{
    public function ballsAction() {
        //echo 'fvadkslr';
        //$wares = DatabaseHandler::getWares();
        $balls = DatabaseHandler::getWaresOfType(7);
        $filters = DatabaseHandler::getFiltersForWareType('Football ball');

        $this->view->generate('BallsView.php', 'SCommonMarkupView.php', $balls, $filters);
    }

    public function football_bootsAction() {
        //echo 'fvadkslr';
        //$wares = DatabaseHandler::getWares();
        $footballBoots = DatabaseHandler::getWaresOfType(4);
        $filters = DatabaseHandler::getFiltersForWareType('Football boots');

        $this->view->generate('BallsView.php', 'SCommonMarkupView.php', $footballBoots, $filters);
    }
}