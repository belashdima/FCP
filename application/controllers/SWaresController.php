<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SWaresController extends SController
{
    public function ballsAction() {
        $balls = DatabaseHandler::getWaresOfType(7, true);
        $balls = self::filterUsingParams($balls, $_GET);
        //$balls = self::filterEqual($balls);

        $filters = DatabaseHandler::getFiltersForWareType(7);


        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $balls, $filters);
    }

    public function football_bootsAction() {
        $footballBoots = DatabaseHandler::getWaresOfType(4, true);
        $footballBoots = self::filterUsingParams($footballBoots, $_GET);

        $filters = DatabaseHandler::getFiltersForWareType(4);

        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $footballBoots, $filters);
    }

    public function wareAction() {
        $params = $_GET;
        unset($params['wareTypeId']);

        $wares = DatabaseHandler::getWaresOfType(7, false);
        $wares = self::filterUsingParams($wares, $params);
        $ware = DatabaseHandler::getAllForWare($wares[0]->getWareId());

        //echo $wareId;
        //$ware = DatabaseHandler::getAllForWare($wareId);
        //$ware = DatabaseHandler::getAllForWareByParams($params);

        $this->view->generate('SWareView.php', 'SCommonMarkupView.php', $ware);
    }

    private static function filterUsingParams($wares, $params)
    {
        if (count($params) > 0) {
            $filteredWares = array();

            foreach ($wares as $ware) {
                $passesFilter = true;

                $properties = $ware->getProperties();
                foreach ($properties as $propertyValue) {
                    if (array_key_exists($propertyValue->getProperty()->getUrlPresentation(), $params)) {
                        if (strcmp(strtolower($propertyValue->getValue()->getValue()), strtolower($params[$propertyValue->getProperty()->getUrlPresentation()])) == 0) {

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

    private static function filterEqual($wares)
    {
        //return array_unique($wares, SORT_REGULAR);
        foreach ($wares as $ware) {
            if (in_array($ware, $wares)){
            }
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
    }
}