<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class PopularCategoriesController extends Controller
{
    public function showPopularCategories()
    {
        $popularCategories = DatabaseHandler::getPopularCategories();

        $this->view->generate('PopularCategoriesView.php', 'CommonMarkupView.php', $popularCategories);
    }

    public function getPopularCategories()
    {
        echo json_encode(DatabaseHandler::getPopularCategories());
    }

    public function addPopularCategory()
    {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        DatabaseHandler::addPopularCategory($name, $url, $image);
    }

    public function deletePopularCategory()
    {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        DatabaseHandler::deletePopularCategory($name, $url, $image);
    }

    public function setPopularCategory()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        DatabaseHandler::setPopularCategory($id, $name, $url, $image);
    }
}