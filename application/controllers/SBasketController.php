<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';

class SBasketController extends SController
{
    public function showBasket() {
        /*$items = (new DatabaseHandler())->getItemsByCategory($categoryId);
        $items = self::filterUsingParams($items, $_GET);

        $filters = (new DatabaseHandler())->getFiltersForCategory($categoryId);*/

        //session_start();
        //print_r($_SESSION);
        $basketItems = array();
        if (!empty($_SESSION['basket_items'])) {
            $basketItems = $_SESSION['basket_items'];
        }
        $data = new stdClass();
        $data->basketItems = $basketItems;

        $this->view->generate('SBasketView.php', 'SCommonMarkupView.php', $data);
        //$this->view->generate('BasketView2.php', 'SCommonMarkupView.php', $data);
    }

    public function add()
    {
        $basketItem = new stdClass();
        $basketItem->itemId = $_GET['item_id'];
        $basketItem->size = $_GET['item_size'];
        if (!key_exists('basket_items', $_SESSION)) {
            $_SESSION['basket_items'] = array();
        }
        array_push($_SESSION['basket_items'], $basketItem);
        //array_push($_SESSION, $basketItem);
        print_r($_SESSION);
        //echo $_SESSION['foo'];
        return;
    }

    public function delete()
    {
        $basketItem = new stdClass();
        $basketItem->itemId = $_GET['item_id'];
        $basketItem->size = $_GET['item_size'];
        if (!key_exists('basket_items', $_SESSION)) {
            $_SESSION['basket_items'] = array();
        } else {
            $index = array_search($basketItem, $_SESSION['basket_items']);
            //if (in_array($basketItem, $_SESSION['basket_items'])) {
            if (in_array($basketItem, $_SESSION['basket_items'])) {
                echo "deleted";
                unset($_SESSION['basket_items'][$index]);
                $_SESSION['basket_items'] = array_values($_SESSION['basket_items']);
            } else {
                echo "undeleted";
            }
        }
        //array_push($_SESSION, $basketItem);
        //print_r($_SESSION);
        //echo $_SESSION['foo'];
        return;
    }
}