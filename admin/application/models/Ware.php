<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class Ware
{
    // wareId, array({wareTypeId, wareTypeName}), array({property_id, property_name, valueId, value_v});

    public $wareId;
    public $wareTypes;
    public $properties;

    /**
     * Ware constructor.
     * @param $wareId
     * @param $wareTypes
     * @param $properties
     */
    public function __construct($wareId, $wareTypes, $properties)
    {
        $this->wareId = $wareId;
        $this->wareTypes = $wareTypes;
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getWareId()
    {
        return $this->wareId;
    }

    /**
     * @param mixed $wareId
     */
    public function setWareId($wareId)
    {
        $this->wareId = $wareId;
    }

    /**
     * @return mixed
     */
    public function getWareTypes()
    {
        return $this->wareTypes;
    }

    /**
     * @param mixed $wareTypes
     */
    public function setWareTypes($wareTypes)
    {
        $this->wareTypes = $wareTypes;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param mixed $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    public function getPropertyValueById($propertyId) {
        foreach ($this->properties as $propertyValue) {
            $currentPropertyId = $propertyValue->getProperty()->getPropertyId();
            if ($currentPropertyId == $propertyId) {
                return $propertyValue->getValue()->getValue();
            }
        }

        return null;
    }

    public function getPropertyValueByName($propertyName) {
        foreach ($this->properties as $propertyValue) {
            $currentPropertyName = $propertyValue->getProperty()->getPropertyName();
            if ($currentPropertyName == $propertyName) {
                return $propertyValue->getValue()->getValue();
            }
        }

        return null;
    }
}