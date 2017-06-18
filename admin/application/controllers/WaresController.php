<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class WaresController extends Controller
{
    public function indexAction() {
        //$wares = DatabaseHandler::getWares();
        $wares = DatabaseHandler::getWaresOfType(1);
        $this->view->generate('WaresView.php', 'CommonMarkupView.php', $wares);
    }

    public function wareAction() {
        $wareId = $_GET['id'];

        $ware = DatabaseHandler::getAllForWare($wareId);

        $this->view->generate('WareView.php', 'CommonMarkupView.php', $ware);
    }

    public function football_ballsAction() {
        $wareTypeId = 7;
        $balls = DatabaseHandler::getWaresOfType($wareTypeId);
        $this->view->generate('WaresView.php', 'CommonMarkupView.php', $balls);
    }

    public function indoor_ballsAction() {
        $wareTypeId = 8;
        $balls = DatabaseHandler::getWaresOfType($wareTypeId);
        $this->view->generate('WaresView.php', 'CommonMarkupView.php', $balls);
    }

    public function wares_jsonAction() {
        $wareTypeId = $_GET['ware_type_id'];

        if ($wareTypeId != null) {
            echo json_encode(DatabaseHandler::getWaresOfType($wareTypeId));
        } else {
            echo json_encode(DatabaseHandler::getWares());
        }

        //$this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
    }

    public function ware_jsonAction() {
        $wareId = $_GET['ware_id'];

        //echo DatabaseHandler::getJSONPropertiesForWare($wareId);
        echo json_encode(DatabaseHandler::getAllForWare($wareId));

        //$this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
    }
}