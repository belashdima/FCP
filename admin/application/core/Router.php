<?php

class Router
{
    static function showItemsOfCategory($categoryId) {
        require_once 'application/controllers/ItemsController.php';
        (new ItemsController())->showItemsOfCategoryAction($categoryId);
    }

    static function start()
    {
        $chosen = false;

        // orders
        if (strpos($_SERVER['REQUEST_URI'], '/admin/order_delete') !== false && !$chosen) {
            require_once 'application/controllers/OrdersController.php';
            (new OrdersController())->deleteOrder();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/orders') !== false && !$chosen) {
            require_once 'application/controllers/OrdersController.php';
            (new OrdersController())->showOrders();
            $chosen = true;
        }
        //

        // discounts
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/set?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->setDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/delete?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->deleteDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discount/add?') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->addDiscount();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discounts_json') !== false) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->getDiscounts();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/discounts') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->showDiscounts();
            $chosen = true;
        }
        //

        // popular categories
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/set') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->setPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/delete') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->deletePopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_category/add') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->addPopularCategory();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_categories_json') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->getPopularCategories();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/popular_categories') !== false && !$chosen) {
            require_once 'application/controllers/PopularCategoriesController.php';
            (new PopularCategoriesController())->showPopularCategories();
            $chosen = true;
        }
        //

        require_once 'application/models/DatabaseHandler.php';
        $categories = (new DatabaseHandler())->getAllCategories();
        foreach ($categories as $category) {
            $urlPart = '/admin/'.$category->getUrlPresentation();
            if (strpos($_SERVER['REQUEST_URI'], $urlPart) !== false && count($_GET) == 0) {
                Router::showItemsOfCategory($category->getId());
                $chosen = true;
            }
        }

        // items
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/items_json') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->items_jsonAction();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/item_json') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->item_jsonAction();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/item') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->itemAction();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/create_new') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->create_newAction();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/modify') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->modifyAction();
            $chosen = true;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/items/delete') !== false && !$chosen) {
            require_once 'application/controllers/ItemsController.php';
            (new ItemsController())->deleteAction();
            $chosen = true;
        }
        //

        // the rest
        if (strpos($_SERVER['REQUEST_URI'], '/admin') !== false && !$chosen) {
            /*$siteData = simplexml_load_file('xml/siteData.xml');
            $rootDirectory = $siteData->rootDirectory;*/
            /*header('Location: '.roo);
            exit();*/

            Router::showItemsOfCategory(1);
            $chosen = true;
        }

        if ($chosen) return;
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}