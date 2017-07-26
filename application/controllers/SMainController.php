<?php

require_once 'application/core/SController.php';

class SMainController extends SController
{
    function indexAction()
    {
        $this->view->generate('SMainView.php', 'SCommonMarkupView.php');
    }
}