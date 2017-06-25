<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SWaresController extends SController
{
    public function ballsAction() {
        //echo 'fvadkslr';
        //$wares = DatabaseHandler::getWares();
        //print_r($wareTypeId = $_GET);

        $balls = DatabaseHandler::getWaresOfType(7);
        //print_r($balls);
        $balls = self::filterUsingParams($balls);
        //print_r($balls);

        $filters = DatabaseHandler::getFiltersForWareType('Football ball');


        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $balls, $filters);
    }

    public function football_bootsAction() {
        //echo 'fvadkslr';
        //$wares = DatabaseHandler::getWares();
        $footballBoots = DatabaseHandler::getWaresOfType(4);
        $filters = DatabaseHandler::getFiltersForWareType('Football boots');

        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $footballBoots, $filters);
    }

    private static function filterUsingParams($wares)
    {
        if (count($_GET) > 0) {
            $filteredWares = array();

            foreach ($wares as $ware) {
                $properties = $ware->getProperties();
                foreach ($properties as $property) {
                    if (array_key_exists($property->getProperty()->getPropertyName(), $_GET) && //strcmp($property->getProperty()->getPropertyName(), $_GET[$property->getProperty()->getPropertyName()]) == 0 &&
                        strcmp($property->getValue()->getValue(), $_GET[$property->getProperty()->getPropertyName()]) == 0) {
                        $filteredWares[] = $ware;
                    }
                }
            }

            return $filteredWares;
        } else {
            return $wares;
        }
    }
}