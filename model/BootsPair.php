<?php

class BootsPair
{
    private $bootsId;
    private $bootsSize;
    private $bootsModel;

    private $bootsPrice;// may differ from modelPrice

    public function __construct($bootsId, $bootsSize, $bootsModel, $bootsPrice)
    {
        $this->bootsId = $bootsId;
        $this->bootsSize = $bootsSize;
        $this->bootsModel = $bootsModel;
        $this->bootsPrice = $bootsPrice;
    }

    public function getBootsId()
    {
        return $this->bootsId;
    }

    public function setBootsId($bootsId)
    {
        $this->bootsId = $bootsId;
    }

    public function getBootsSize()
    {
        return $this->bootsSize;
    }

    public function setBootsSize($bootsSize)
    {
        $this->bootsSize = $bootsSize;
    }

    public function getBootsModel()
    {
        return $this->bootsModel;
    }

    public function setBootsModel($bootsModel)
    {
        $this->bootsModel = $bootsModel;
    }

    public function getBootsPrice()
    {
        return $this->bootsPrice;
    }

    public function setBootsPrice($bootsPrice)
    {
        $this->bootsPrice = $bootsPrice;
    }

    public function init() {
        // upload size
        //$this->bootsSize = DatabaseHandler::getShoeSizeById();

        // upload model
        $this->bootsModel = DatabaseHandler::getModelById($this->bootsModel);
        $this->bootsModel->init();
    }
}