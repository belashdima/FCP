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
    public $images;

    /**
     * Ware constructor.
     * @param $wareId
     * @param $wareTypes
     * @param $properties
     * @param $images
     */
    public function __construct($wareId, $wareTypes, $properties, $images)
    {
        $this->wareId = $wareId;
        $this->wareTypes = $wareTypes;
        $this->properties = $properties;
        $this->images = $images;
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

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
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

    public function getMainImage() {
        if (count($this->getImages()) > 0) {
            if (strpos($this->getImages()[0], 'http') !== false) {
                return $this->getImages()[0];
            } else {
                return 'http://localhost/Footballcity_Project/images/adidas_x.jpg';
            }
        }

        return 'http://localhost/Footballcity_Project/images/adidas_x.jpg';
    }

    public function getLink() {
        $meaningfulProperties = DatabaseHandler::getMeaningfullProperties();
        $params = array();
        foreach ($meaningfulProperties as $meaningfulProperty) {
            $propertyName = $meaningfulProperty->getUrlPresentation();
            $propertyValue = $this->getPropertyValueById($meaningfulProperty->getPropertyId());

            $params[] = $propertyName.'='.$propertyValue;
        }

        return 'wareTypeId='.($this->getWareTypes()[0]->getId()).'&'.implode('&', $params);
    }
}