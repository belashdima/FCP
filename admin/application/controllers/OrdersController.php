<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class OrdersController extends Controller
{
    public function indexAction() {
        $this->showItemsOfCategoryAction(1);
    }

    public function itemAction() {
        $itemId = $_GET['id'];

        $this->showItemById($itemId);
    }

    public function showOrders() {
        $orders = (new DatabaseHandler())->getOrders();
        $data = new stdClass();
        $data->orders = $orders;
        $this->view->generate('OrdersView.php', 'CommonMarkupView.php', $data);
    }

    public function items_jsonAction() {
        $category = $_GET['category_id'];

        $databaseHandler = new DatabaseHandler();
        if ($category != null) {
            echo json_encode($databaseHandler->getItemsByCategory($category));
        } else {
            echo json_encode($databaseHandler->getItems());
        }
    }

    public function item_jsonAction() {
        $itemId = $_GET['item_id'];

        echo json_encode((new DatabaseHandler())->getAllForItem($itemId));
    }

    public function create_newAction() {
        $categoryId = $_GET['category_id'];

        $itemId = (new DatabaseHandler())->createItemOfCategory($categoryId);

        echo $itemId;
    }

    public function modifyAction() {
        $json = file_get_contents('php://input');
        $item = json_decode($json);

        $result2 = Item::setSizesForItem($item);
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->setPropertiesForItem($item);
        $databaseHandler->setImagesForItem($item->images, $item->id);
        $databaseHandler->setDiscount($item->id, $item->discountPercent);

        echo $result && $result2;
    }

    public function deleteAction() {
        $itemId = $_GET['item_id'];

        $result = (new DatabaseHandler())->deleteItemById($itemId);

        if ($result) echo 'deleted';
    }

    public function getDiscounts() {
        echo json_encode((new DatabaseHandler())->getDiscounts());
    }

    public function showDiscounts() {
        $discounts = (new DatabaseHandler())->getDiscounts();

        $this->view->generate('DiscountsView.php', 'CommonMarkupView.php', $discounts);
    }

    public function setDiscount() {
        $brand = $_GET['brand'];
        $model = $_GET['model'];
        $discountPercent = $_GET['discountPercent'];

        (new DatabaseHandler())->setDiscount($brand, $model, $discountPercent);
    }

    public function deleteDiscount() {
        $brand = $_GET['brand'];
        $model = $_GET['model'];

        (new DatabaseHandler())->deleteDiscount($brand, $model);
    }

    public function addDiscount()
    {
        $brand = $_GET['brand'];
        $model = $_GET['model'];
        $discountPercent = $_GET['discountPercent'];

        (new DatabaseHandler())->addDiscount($brand, $model, $discountPercent);
    }

    private function showItemById($itemId)
    {
        $item = (new DatabaseHandler())->getAllForItem($itemId);

        $this->view->generate('WareView.php', 'CommonMarkupView.php', $item);
    }

    public function deleteOrder()
    {
        $orderId = $_GET['order_id'];

        $result = (new DatabaseHandler())->deleteOrderById($orderId);
        if ($result) echo 'deleted';
    }
}