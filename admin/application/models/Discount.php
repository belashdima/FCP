<?php

class Discount
{
    public $brand;
    public $model;
    public $discountPercent;

    /**
     * Discount constructor.
     * @param $brand
     * @param $model
     * @param $discountPercent
     */
    public function __construct($brand, $model, $discountPercent)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->discountPercent = $discountPercent;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @param mixed $discountPercent
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
    }
}