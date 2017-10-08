<?php

require_once '../admin/application/core/Controller.php';
require_once '../admin/application/models/DatabaseHandler.php';

class PopularCategoriesController extends Controller
{
    public function showPopularCategories()
    {
        $popularCategories = (new DatabaseHandler)->getPopularCategories();

        $this->view->generate('PopularCategoriesView.php', 'CommonMarkupView.php', $popularCategories);
    }

    public function getPopularCategories()
    {
        echo json_encode((new DatabaseHandler)->getPopularCategories());
    }

    public function addPopularCategory()
    {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        (new DatabaseHandler)->addPopularCategory($name, $url, $image);
    }

    public function deletePopularCategory()
    {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        (new DatabaseHandler)->deletePopularCategory($name, $url, $image);
    }

    public function setPopularCategory()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        $image = $_POST['image'];

        (new DatabaseHandler)->setPopularCategory($id, $name, $url, $image);
    }
}