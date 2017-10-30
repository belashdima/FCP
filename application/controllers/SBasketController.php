<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';

class SBasketController extends SController
{
    public function getBasket_json() {
        $basketItems = array();
        if (!empty($_SESSION['basket_items'])) {
            $basketItems = $_SESSION['basket_items'];
        }
        $data = new stdClass();
        $data->basketItems = $basketItems;

        echo json_encode($basketItems);
    }

    public function showBasket() {
        $basketItems = array();
        if (!empty($_SESSION['basket_items'])) {
            $basketItems = $_SESSION['basket_items'];
        }
        $data = new stdClass();
        $data->basketItems = $basketItems;

        $this->view->generate('SBasketView.php', 'SCommonMarkupView.php', $data);
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
            if (in_array($basketItem, $_SESSION['basket_items'])) {
                echo "deleted";
                unset($_SESSION['basket_items'][$index]);
                $_SESSION['basket_items'] = array_values($_SESSION['basket_items']);
            } else {
                echo "undeleted";
            }
        }
        return;
    }

    public function completeOrder()
    {
        $fio = $_GET['fio'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $additional = $_GET['additional'];
        $basketItems = $_SESSION['basket_items'];

        $result = (new DatabaseHandler())->createOrder($fio, $email, $phone, $additional, $basketItems);
        if ($result) echo 'success';
    }
}