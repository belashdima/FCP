<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class OrdersController extends Controller
{
    public function showOrders() {
        $orders = (new DatabaseHandler())->getOrders();
        $data = new stdClass();
        $data->orders = $orders;
        $this->view->generate('OrdersView.php', 'CommonMarkupView.php', $data);
    }

    public function deleteOrder()
    {
        $orderId = $_GET['order_id'];

        $result = (new DatabaseHandler())->deleteOrderById($orderId);
        if ($result) echo 'deleted';
    }
}