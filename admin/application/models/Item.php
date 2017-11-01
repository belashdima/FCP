<?php

require_once "SizeOfItem.php";
require_once "ShoeSize.php";
require_once "BallSize.php";

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class Item
{
    // wareId, array({wareTypeId, wareTypeName}), array({property_id, property_name, valueId, value_v});

    public $id;
    public $categories;
    public $properties;
    public $images;
    public $discountPercent;
    public $visitsCount;
    public $finalPrice;


    public $category;
    public $brand;
    public $collection;
    public $model;

    public $sizes;
    public $availableSizes;

    /**
     * Item constructor.
     * @param $wareId
     * @param $wareTypes
     * @param $properties
     * @param $images
     */
    public function __construct($id, $categories, $properties, $images, $discountPercent = null, $visitsCount)
    {
        $this->id = $id;
        $this->categories = $categories;
        $this->properties = $properties;
        $this->images = $images;

        $this->discountPercent = $discountPercent;
        $this->visitsCount = $visitsCount;
        $price = $this->getPropertyValueByUrlPresentation('price');
        $this->finalPrice = $price - $price * $discountPercent / 100;

        Item::setCategory();
        Item::setBrand();
        Item::setCollection();
        Item::setModel();
        
        $this->fillSizes();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $wareId
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $wareTypes
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
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

    /**
     * @return mixed
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
    }

    /**
     * @return mixed
     */
    public function getVisitsCount()
    {
        return $this->visitsCount;
    }

    /**
     * @param mixed $visitsCount
     */
    public function setVisitsCount($visitsCount)
    {
        $this->visitsCount = $visitsCount;
    }




    public function getPropertyValueById($propertyId) {
        //echo $propertyId;
        foreach ($this->properties as $propertyValue) {
            //print_r($propertyValue);
            $currentPropertyId = $propertyValue->getProperty()->getPropertyId();
            if ($currentPropertyId == $propertyId) {
                if ($propertyValue->getValue() != null) {
                    return $propertyValue->getValue()->getValue();
                } else return null;
            }
        }

        return null;
    }

    public function getPropertyValueByName($propertyName) {
        foreach ($this->properties as $propertyValue) {
            $currentPropertyName = $propertyValue->getProperty()->getRusPropertyName();
            if (strcmp($currentPropertyName, $propertyName) == 0) {
                return $propertyValue->getValue()->getValue();
            }
        }

        return null;
    }

    public function getPropertyValueByUrlPresentation($urlPresentation) {
        foreach ($this->properties as $propertyValue) {
            $currentUrlPresentation = $propertyValue->getProperty()->getUrlPresentation();
            if (strcmp($currentUrlPresentation, $urlPresentation) == 0) {
                if ($propertyValue->getValue() != null)
                return $propertyValue->getValue()->getValue();
                else return null;
            }
        }

        return null;
    }

    public function getMainImage() {
        if (count($this->getImages()) > 0) {
            if (strpos($this->getImages()[0], 'http') !== false) {
                return $this->getImages()[0];
            } else {
                return $rootDirectory.'/images/adidas_x.jpg';
            }
        }

        return $rootDirectory.'/images/adidas_x.jpg';
    }

    public function getLink() {
        /*$meaningfulProperties = (new DatabaseHandler)->getMeaningfullProperties();
        $params = array();
        foreach ($meaningfulProperties as $meaningfulProperty) {
            $propertyName = $meaningfulProperty->getUrlPresentation();
            $propertyValue = $this->getPropertyValueById($meaningfulProperty->getPropertyId());

            $params[] = $propertyName.'='.$propertyValue;
        }

        return 'categoryId='.($this->getCategories()[0]->getId()).'&'.implode('&', $params);*/
        return "id=".$this->id;
    }

    public function getCategory() {
        return $this->category ;
    }

    private function setCategory() {
        $this->category = $this->categories[0];
    }

    private function setBrand()
    {
        $this->brand = Item::getPropertyValueByUrlPresentation("brand");
    }

    private function setCollection()
    {
        $this->collection = Item::getPropertyValueByUrlPresentation("collection");
    }

    private function setModel()
    {
        $this->model = Item::getPropertyValueByUrlPresentation("model");
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function getModel()
    {
        return $this->model;
    }

    private function fillSizes()
    {
        $sizePropertyUrlPresentation = Item::getSizePropertyUrlPresentation(json_encode($this->categories));

        if ($sizePropertyUrlPresentation == null) {
            $this->sizes = array(); // empty array
        } else {
            $sizePropertyValue = $this->getPropertyValueByUrlPresentation($sizePropertyUrlPresentation);
            if (strcmp($sizePropertyUrlPresentation, "shoe_size") == 0) {
                $this->sizes = array(); // empty array
                //echo $sizePropertyValue;
                if ($sizePropertyValue == null) {
                    $this->sizes = SizeOfItem::getEmptyShoeSizes();
                } else {
                    $this->sizes = json_decode($sizePropertyValue);
                }
            } else if (strcmp($sizePropertyUrlPresentation, "clothing_size") == 0) {
                $this->sizes = array(); // empty array
                if ($sizePropertyValue == null) {
                    $this->sizes = SizeOfItem::getEmptyClothingSizes();
                } else {
                    $this->sizes = json_decode($sizePropertyValue);
                }
            } else if (strcmp($sizePropertyUrlPresentation, "ball_size") == 0) {
                $this->sizes = array(); // empty array
                if ($sizePropertyValue == null) {
                    $this->sizes = SizeOfItem::getEmptyBallSizes();
                } else {
                    $this->sizes = json_decode($sizePropertyValue);
                }
            }
        }
    }

    private static function getSizePropertyUrlPresentation($jsonCategories) {
        $cats = json_decode($jsonCategories);

        foreach ($cats as $cat) {
            if (strcmp($cat->name, "Shoes") == 0) {
                return "shoe_size";
            } else if (strcmp($cat->name, "Clothing") == 0) {
                return "clothing_size";
            } else if (strcmp($cat->name, "Ball") == 0) {
                return "ball_size";
            }
        }

        return null;
    }

    public static function setSizesForItem($item)
    {
        $sizePropertyUrlPresentation = Item::getSizePropertyUrlPresentation(json_encode($item->categories));

        foreach ($item->properties as $prop) {
            if (strcmp($prop->property->urlPresentation, $sizePropertyUrlPresentation) == 0) {
                $prop->value = new stdClass();
                $prop->value->value = json_encode($item->sizes);
            }
        }

        return true;
    }
}