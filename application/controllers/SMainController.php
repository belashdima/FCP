<?php

require_once 'application/core/SController.php';
require_once 'admin/application/models/DatabaseHandler.php';

class SMainController extends SController
{
    function indexAction()
    {
        $popularCategories = DatabaseHandler::getPopularCategories();

        $this->view->generate('SMainView.php', 'SCommonMarkupView.php', $popularCategories);
    }
}