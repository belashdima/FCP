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
        $wareTypeId = $params['wareTypeId'];
        unset($params['wareTypeId']);

        $wares = DatabaseHandler::getWaresOfType($wareTypeId, false);
        $wares = self::filterUsingParams($wares, $params);
        $ware = DatabaseHandler::getAllForWare($wares[0]->getWareId());
        $uniqueSizes = self::getUniqueSizes($wares);
        sort($uniqueSizes);

        //print_r(count($uniqueSizes));

        $this->view->generate('SWareView.php', 'SCommonMarkupView.php', $ware, bull, $uniqueSizes);
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

    private static function getUniqueSizes($wares)
    {
        $uniqueSizes = array();

        foreach ($wares as $ware) {
            //print_r($ware);
            if (in_array(new WareType(2, 'Shoes', 1), $ware->getWareTypes())) {
                $size = $ware->getPropertyValueByUrlPresentation('shoe_size');
            } else if (in_array(new WareType(3, 'Ball', 1), $ware->getWareTypes())) {
                $size = $ware->getPropertyValueByUrlPresentation('ball_size');
            }

            if (!in_array($size, $uniqueSizes) && $size != null) {
                $uniqueSizes[] = $size;
            }
        }

        return $uniqueSizes;
    }
}