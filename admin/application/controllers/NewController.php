<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class NewController extends Controller
{
    public function indexAction()
    {
        $this->view->generate('NewView.php', 'CommonMarkupView.php');
    }

    /*public function propertiesAction() {
        $wareTypeName = $_GET['ware_type_name'];

        DatabaseHandler::getPropertiesForWareType($wareTypeName);

        $this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
    }*/

    public function properties_jsonAction() {
        $wareTypeName = $_GET['ware_type_name'];

        echo DatabaseHandler::getJSONPropertiesForWareTypes($wareTypeName);
    }

    public function add_newAction() {
        //echo $_GET;
        $wareTypeName = $_GET['ware_type_name'];
        $json = file_get_contents('php://input');
        $properties = json_decode($json);

        //echo print_r($properties);

        DatabaseHandler::saveJSONPropertiesForWareType($wareTypeName, $properties);
    }
}