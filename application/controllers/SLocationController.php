<?php

require_once 'application/core/SController.php';

class SLocationController extends SController {

    public function indexAction() {

        $this->view->generate('SLocationView.php', 'SCommonMarkupView.php');
    }
}