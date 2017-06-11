<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class SBootsController extends Controller
{
    public function indexAction() {
        $this->view->generate('BootsListView.php', 'CommonMarkupView.php');
    }

    public function itemAction($itemId) {
        $this->view->generate('BootsView.php', 'CommonMarkupView.php', $itemId);
    }

    public function setBrandToModelAction() {
        $bootsModelId = $_GET['boots_model_id'];
        $bootsModelBrandName = $_GET['boots_model_brand_name'];

        $bootsModelBrandId = DatabaseHandler::getBrandByName($bootsModelBrandName)->getBrandId();
        DatabaseHandler::setBrandToModel($bootsModelId, $bootsModelBrandId);

        $bootsModelBrandName = DatabaseHandler::getBrandById($bootsModelBrandId)->getBrandName();

        echo $bootsModelBrandName;
    }

    public function setNameToModelAction() {
        $bootsModelId = $_GET['boots_model_id'];
        $bootsModelName = $_GET['boots_model_name'];

        DatabaseHandler::setNameToModel($bootsModelId, $bootsModelName);

        echo $bootsModelName;
    }

    public function setPriceToModelAction() {
        $bootsModelId = $_GET['boots_model_id'];
        $bootsModelPrice = $_GET['boots_model_price'];

        DatabaseHandler::setPriceToModel($bootsModelId, $bootsModelPrice);

        echo $bootsModelPrice;
    }
}