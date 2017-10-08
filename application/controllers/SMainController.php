<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';

class SMainController extends SController
{
    function indexAction()
    {
        $databaseHandler = new DatabaseHandler();
        $popularCategories = $databaseHandler->getPopularCategories();
        $popularItems = $databaseHandler->getMostPopularItems(2);
        $videos = DatabaseHandler::getVideos();

        $data = new stdClass();
        $data->popularCategories = $popularCategories;
        $data->popularItems = $popularItems;
        $data->videos = $videos;

        $this->view->generate('SMainView.php', 'SCommonMarkupView.php', $data);
    }
}