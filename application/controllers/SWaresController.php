<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SWaresController extends SController
{
    public function ballsAction() {
        $balls = DatabaseHandler::getWaresOfType(7);
        $balls = self::filterUsingParams($balls);

        $filters = DatabaseHandler::getFiltersForWareType(7);


        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $balls, $filters);
    }

    public function football_bootsAction() {
        $footballBoots = DatabaseHandler::getWaresOfType(4);
        $filters = DatabaseHandler::getFiltersForWareType(4);

        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $footballBoots, $filters);
    }

    private static function filterUsingParams($wares)
    {
        if (count($_GET) > 0) {
            $filteredWares = array();

            foreach ($wares as $ware) {
                $passesFilter = true;

                $properties = $ware->getProperties();
                foreach ($properties as $propertyValue) {
                    if (array_key_exists($propertyValue->getProperty()->getUrlPresentation(), $_GET)) {
                        if (strcmp(strtolower($propertyValue->getValue()->getValue()), strtolower($_GET[$propertyValue->getProperty()->getUrlPresentation()])) == 0) {

                        } else {
                            $passesFilter = false;
                        }
                    }
                }

                if ($passesFilter) {
                    $filteredWares[] = $ware;
                }
            }

            return $filteredWares;
        } else {
            return $wares;
        }
    }
}