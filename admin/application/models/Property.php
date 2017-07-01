<?php

class Property
{
    public $propertyId;
    public $propertyName;
    public $urlPresentation;

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
    public function getPropertyName()
    {
        return $this->propertyName;
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