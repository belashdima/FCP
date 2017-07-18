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

    public function showWaresOfTypeAction($wareTypeId) {
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

    public function modifyAction() {
        $json = file_get_contents('php://input');
        $ware = json_decode($json);

        //echo DatabaseHandler::getJSONPropertiesForWare($wareId);
        print_r($ware);
        DatabaseHandler::setPropertiesForWare($ware);
        DatabaseHandler::setImagesForWare($ware->images, $ware->wareId);

        //$this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
    }

    public function deleteAction() {
        $wareId = $_GET['ware_id'];

        $result = DatabaseHandler::deleteWareById($wareId);

        if ($result) echo 'deleted';

        //$this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
    }
}