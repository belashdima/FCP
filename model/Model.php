<?php

class Model
{
    private $modelId;
    private $modelName;
    private $modelBrand;
    private $modelPrice;
    private $modelDescription;
    private $images;

    public function __construct($modelId, $modelName, $modelBrand, $modelPrice, $modelDescription)
    {
        $this->modelId = $modelId;
        $this->modelName = $modelName;
        $this->modelBrand = $modelBrand;
        $this->modelPrice = $modelPrice;
        $this->modelDescription = $modelDescription;
    }

    public function getModelId()
    {
        return $this->modelId;
    }

    public function setModelId($modelId)
    {
        $this->modelId = $modelId;
    }

    public function getModelName()
    {
        return $this->modelName;
    }

    public function setModelName($modelName)
    {
        $this->modelName = $modelName;
    }

    public function getModelBrand()
    {
        return $this->modelBrand;
    }

    public function setModelBrand($modelBrand)
    {
        $this->modelBrand = $modelBrand;
    }

    public function getModelPrice()
    {
        return $this->modelPrice;
    }

    public function setModelPrice($modelPrice)
    {
        $this->modelPrice = $modelPrice;
    }

    public function getModelDescription()
    {
        return $this->modelDescription;
    }

    public function setModelDescription($modelDescription)
    {
        $this->modelDescription = $modelDescription;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }



    public function init() {
        // upload brand
        $this->modelBrand = DatabaseHandler::getBrandById($this->modelBrand);
        // upload images
        $this->images = DatabaseHandler::getImagesByModelId($this->modelId);
    }
}