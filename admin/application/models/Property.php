<?php

class Property
{
    public $propertyId;
    public $propertyName;

    /**
     * Property constructor.
     * @param $propertyId
     * @param $propertyName
     */
    public function __construct($propertyId, $propertyName)
    {
        $this->propertyId = $propertyId;
        $this->propertyName = $propertyName;
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


}