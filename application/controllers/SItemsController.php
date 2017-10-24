<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';


class SItemsController extends SController
{
    public function categoryAction($categoryId) {
        $items = (new DatabaseHandler())->getItemsByCategory($categoryId);
        $items = self::filterUsingParams($items, $_GET);

        $filters = (new DatabaseHandler())->getFiltersForCategory($categoryId);

        $data = new stdClass();
        $data->items = $items;
        $data->filters = $filters;

        $this->view->generate('ContentView.php', 'SCommonMarkupView.php', $data);
    }

    public function itemAction() {
        $itemId = $_GET['id'];
        if (key_exists('added', $_GET) && strcmp($_GET['added'], "true") == 0) {
            $added = true;
        } else {
            $added = false;
        }


        $databaseHandler = new DatabaseHandler();
        $item = $databaseHandler->getAllForItem($itemId);

        $databaseHandler->incrementItemVisits($itemId);

        $data = new stdClass();
        $data->item = $item;
        $data->added = $added;

        $this->view->generate('SWareView.php', 'SCommonMarkupView.php', $data);
    }

    private static function filterUsingParams($items, $params)
    {
        if (!empty($params) && is_array($items)) {
            $filteredWares = array();

            foreach ($items as $item) {
                $passesFilter = true;

                $properties = $item->getProperties();
                foreach ($properties as $propertyValue) {
                    if (array_key_exists($propertyValue->getProperty()->getUrlPresentation(), $params)) {
                        /* price filter */
                        if (strcmp($propertyValue->getProperty()->getUrlPresentation(), 'price') == 0) {
                            $priceParamValue = $params[$propertyValue->getProperty()->getUrlPresentation()];
                            $limits = explode('-', $priceParamValue);
                            //$warePrice = $propertyValue->getValue()->getValue();
                            $warePrice = $item->finalPrice;
                            if (strcmp($limits[0], 'nolimit') == 0) {
                                $limits[0] = 0;
                            }
                            if (strcmp($limits[1], 'nolimit') == 0) {
                                $limits[1] = 999999;
                            }
                            if ($warePrice > $limits[0] && $warePrice < $limits[1]) {

                            } else {
                                $passesFilter = false;
                            }
                        }
                        /* end of price filter */
                        /* size filter */
                        else if (strpos($propertyValue->getProperty()->getUrlPresentation(), 'size') !== false) {
                            $sizeFromFilter = $params[$propertyValue->getProperty()->getUrlPresentation()];
                            $sizesJson = $propertyValue->getValue()->getValue();
                            $sizes = json_decode($sizesJson);
                            //print_r($sizes);
                            $passesFilter = false;
                            foreach ($sizes as $size) {
                                if (strcmp($size->size->sizeName, $sizeFromFilter) == 0 && $size->quantity > 0) {
                                    $passesFilter = true;
                                }
                            }
                        }
                        /* end of size filter */
                        else {
                            if (strcmp(strtolower($propertyValue->getValue()->getValue()), strtolower($params[$propertyValue->getProperty()->getUrlPresentation()])) == 0) {

                            } else {
                                $passesFilter = false;
                            }
                        }
                    }
                }

                if ($passesFilter) {
                    $filteredWares[] = $item;
                }
            }

            return $filteredWares;
        } else {
            return $items;
        }
    }

    /*private static function getUniqueSizes($wares)
    {
        $uniqueSizes = array();

        foreach ($wares as $ware) {
            //print_r($ware);
            if (in_array(new Category(2, 'Shoes', 1), $ware->getCategories())) {
                $size = $ware->getPropertyValueByUrlPresentation('shoe_size');
            } else if (in_array(new WareType(3, 'Ball', 1), $ware->getWareTypes())) {
                $size = $ware->getPropertyValueByUrlPresentation('ball_size');
            }

            if (!in_array($size, $uniqueSizes) && $size != null) {
                $uniqueSizes[] = $size;
            }
        }

        return $uniqueSizes;
    }*/
}