<?php

class Property
{
    public $propertyId;
    public $propertyName;
    public $urlPresentation;

    public $rusPropertyName;

    /**
     * Property constructor.
     * @param $propertyId
     * @param $propertyName
     * @param $urlPresentation
     */
    public function __construct($propertyId, $propertyName, $urlPresentation)
    {
        $this->propertyId = $propertyId;
        $this->propertyName = $propertyName;
        $this->urlPresentation = $urlPresentation;

        $this->rusPropertyName = $this->getRusPropertyName();
    }


    /**
     * @return mixed
     */
    public function getPropertyId()
    {
        return $this->propertyId;
    }

    /**
     * @param mixed $propertyId
     */
    public function setPropertyId($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    /**
     * @return mixed
     */
    public function getRusPropertyName()
    {
        //return $this->propertyName;

        if (strcmp($this->getUrlPresentation(), 'price') == 0) {
            return 'Цена';
        } else  if (strcmp($this->getUrlPresentation(), 'ball_size') == 0) {
            return 'Размер';
        } else  if (strcmp($this->getUrlPresentation(), 'shoe_size') == 0) {
            return 'Размер';
        } else  if (strcmp($this->getUrlPresentation(), 'brand') == 0) {
            return 'Бренд';
        } else  if (strcmp($this->getUrlPresentation(), 'collection') == 0) {
            return 'Коллекция';
        } else  if (strcmp($this->getUrlPresentation(), 'model') == 0) {
            return 'Модель';
        } else  if (strcmp($this->getUrlPresentation(), 'description') == 0) {
            return 'Описание';
        } else  if (strcmp($this->getUrlPresentation(), 'color') == 0) {
            return 'Цвет';
        } else  if (strcmp($this->getUrlPresentation(), 'ground_type') == 0) {
            return 'Тип покрытия';
        } else  if (strcmp($this->getUrlPresentation(), 'clothing_size') == 0) {
            return 'Размер';
        } else  if (strcmp($this->getUrlPresentation(), 'price') == 0) {
            return 'Undefined property';
        }
    }

    /**
     * @param mixed $propertyName
     */
    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * @return mixed
     */
    public function getUrlPresentation()
    {
        return $this->urlPresentation;
    }

    /**
     * @param mixed $urlPresentation
     */
    public function setUrlPresentation($urlPresentation)
    {
        $this->urlPresentation = $urlPresentation;
    }
}