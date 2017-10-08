<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
require_once "Brand.php";
require_once "GroundType.php";
require_once "ShoeSize.php";
require_once "Category.php";
require_once "Property.php";
require_once "Item.php";
require_once "Value.php";
require_once "PropertyValue.php";
require_once "Filter.php";
require_once "PopularCategory.php";

/*DatabaseHandler::getConnection();
print_r(DatabaseHandler::getBrands());
print_r(DatabaseHandler::getGroundTypes());
print_r(DatabaseHandler::getShoeSizes());
print_r(DatabaseHandler::getBoots());
print_r(DatabaseHandler::getModelById(1));
print_r(DatabaseHandler::getImagesByModelId(1));*/

class DatabaseHandler
{
    public static $TABLE_CATEGORIES_NAME = "categories";
    public static $TABLE_CATEGORIES_COLUMN_ID = "category_id";
    public static $TABLE_CATEGORIES_COLUMN_NAME = "category_name";
    public static $TABLE_CATEGORIES_COLUMN_PARENT = "parent_category";
    public static $TABLE_CATEGORIES_COLUMN_URL_PRESENTATION = "url_presentation";
    public static $TABLE_CATEGORIES_COLUMN_SHOWN = "shown";

    public static $TABLE_PROPERTIES_NAME = "properties";
    public static $TABLE_PROPERTIES_COLUMN_ID = "property_id";
    public static $TABLE_PROPERTIES_COLUMN_NAME = "property_name";
    public static $TABLE_PROPERTIES_COLUMN_TYPE = "type";
    public static $TABLE_PROPERTIES_COLUMN_URL_PRESENTATION = "url_presentation";

    public static $TABLE_ITEMS_NAME = "items";
    public static $TABLE_ITEMS_COLUMN_ID = "item_id";
    public static $TABLE_ITEMS_COLUMN_DESCRIPTION = "description";
    public static $TABLE_ITEMS_COLUMN_CATEGORY = "category";
    public static $TABLE_ITEMS_COLUMN_DISCOUNT_PERCENT = "discount_percent";
    public static $TABLE_ITEMS_COLUMN_VISITS_COUNT = "visits_count";

    public static $TABLE_ITEM_PROPERTY_VALUE_NAME = "item_property_value";
    public static $TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM = "item";
    public static $TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY = "property";
    public static $TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE = "value_v";

    public static $TABLE_PROPERTY_TO_CATEGORY_NAME = "property_to_category";
    public static $TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY = "category";
    public static $TABLE_PROPERTY_TO_CATEGORY_COLUMN_PROPERTY = "property";

    public static $TABLE_VALUES_NAME = "values_table";
    public static $TABLE_VALUES_COLUMN_ID = "value_id";
    public static $TABLE_VALUES_COLUMN_VALUE = "value_v";


    public static $TABLE_IMAGE_TO_ITEM_NAME = "image_to_item";
    public static $TABLE_IMAGE_TO_ITEM_COLUMN_IMAGE = "image";
    public static $TABLE_IMAGE_TO_ITEM_COLUMN_ITEM = "item";


    public static $TABLE_IMAGES_NAME = "images";
    public static $TABLE_IMAGES_COLUMN_ID = "image_id";
    public static $TABLE_IMAGES_COLUMN_PATH = "image_path";


    public static $TABLE_DISCOUNTS_NAME = "discounts_table";
    public static $TABLE_DISCOUNTS_COLUMN_BRAND = "brand";
    public static $TABLE_DISCOUNTS_COLUMN_MODEL = "model";
    public static $TABLE_DISCOUNTS_COLUMN_PERCENT = "discount_percent";

    public static $TABLE_POPULAR_CATEGORIES_NAME = "popular_categories_table";
    public static $TABLE_POPULAR_CATEGORIES_COLUMN_ID = "popular_category_id";
    public static $TABLE_POPULAR_CATEGORIES_COLUMN_NAME = "popular_category_name";
    public static $TABLE_POPULAR_CATEGORIES_COLUMN_URL = "popular_category_url";
    public static $TABLE_POPULAR_CATEGORIES_COLUMN_IMAGE = "popular_category_image";

    public static $TABLE_SHOE_SIZES_NAME = "shoe_sizes_table";
    public static $TABLE_SHOE_SIZES_COLUMN_ID = "size_id";
    public static $TABLE_SHOE_SIZES_COLUMN_EU = "size_eu";
    public static $TABLE_SHOE_SIZES_COLUMN_UK = "size_uk";
    public static $TABLE_SHOE_SIZES_COLUMN_US = "size_us";


    static private $connection;

    public function __construct()
    {
        $this->getConnection();
    }

    static public function getConnection() {
        if (self::$connection == null) {
            $servername = "127.0.0.1";// "localhost" not works
            $databaseName = "fc_database";
            $username = "root";
            $password = "rootp";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully";
                return $conn;
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            return self::$connection;
        }
    }

    private static function getSizes()
    {

    }

    public function getShoeSizes() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_SHOE_SIZES_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $sizesList = array();
        while ($row = $result->fetch()) {
            $sizeId = $row[self::$TABLE_SHOE_SIZES_COLUMN_ID];
            $sizeEU = $row[self::$TABLE_SHOE_SIZES_COLUMN_EU];
            $sizeUK = $row[self::$TABLE_SHOE_SIZES_COLUMN_UK];
            $sizeUS = $row[self::$TABLE_SHOE_SIZES_COLUMN_US];
            $sizesList[] = new ShoeSize($sizeId, $sizeEU, $sizeUK, $sizeUS);
        }

        return $sizesList;
    }

    public function getShoeSizeById($sizeId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".
            self::$TABLE_SHOE_SIZES_NAME
            ." WHERE ".
            self::$TABLE_SHOE_SIZES_NAME.".".self::$TABLE_SHOE_SIZES_COLUMN_ID."='".$sizeId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $size = null;
        while ($row = $result->fetch()) {
            $sizeId = $row[self::$TABLE_SHOE_SIZES_COLUMN_ID];
            $sizeEU = $row[self::$TABLE_SHOE_SIZES_COLUMN_EU];
            $sizeUK = $row[self::$TABLE_SHOE_SIZES_COLUMN_UK];
            $sizeUS = $row[self::$TABLE_SHOE_SIZES_COLUMN_US];
            $size = new ShoeSize($sizeId, $sizeEU, $sizeUK, $sizeUS);
        }

        return $size;
    }

    public function getAllCategories() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_CATEGORIES_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $categoriesList[] = new Category(
                $row[self::$TABLE_CATEGORIES_COLUMN_ID],
                $row[self::$TABLE_CATEGORIES_COLUMN_NAME],
                $row[self::$TABLE_CATEGORIES_COLUMN_PARENT],
                $row[self::$TABLE_CATEGORIES_COLUMN_SHOWN],
                $row[self::$TABLE_CATEGORIES_COLUMN_URL_PRESENTATION]);
        }

        return $categoriesList;
    }

    public function getAllUsedCategories() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_CATEGORIES_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $usedItemIds = array();
        array_push($usedItemIds, 2);
        array_push($usedItemIds, 4);
        array_push($usedItemIds, 5);
        array_push($usedItemIds, 6);
        array_push($usedItemIds, 7);
        array_push($usedItemIds, 8);
        array_push($usedItemIds, 23);
        array_push($usedItemIds, 27);
        array_push($usedItemIds, 21);
        array_push($usedItemIds, 28);
        array_push($usedItemIds, 29);
        array_push($usedItemIds, 24);
        array_push($usedItemIds, 30);
        array_push($usedItemIds, 31);
        array_push($usedItemIds, 32);
        array_push($usedItemIds, 33);
        array_push($usedItemIds, 34);
        array_push($usedItemIds, 35);
        array_push($usedItemIds, 36);
        array_push($usedItemIds, 37);
        array_push($usedItemIds, 38);

        $categoriesList = array();
        while ($row = $result->fetch()) {
            if (in_array($row[self::$TABLE_CATEGORIES_COLUMN_ID], $usedItemIds)) {
                $categoriesList[] = new Category(
                    $row[self::$TABLE_CATEGORIES_COLUMN_ID],
                    $row[self::$TABLE_CATEGORIES_COLUMN_NAME],
                    $row[self::$TABLE_CATEGORIES_COLUMN_PARENT],
                    $row[self::$TABLE_CATEGORIES_COLUMN_SHOWN],
                    $row[self::$TABLE_CATEGORIES_COLUMN_URL_PRESENTATION]);
            }
        }

        return $categoriesList;
    }

    public static function getPropertiesForCategory($categoryName)
    {
        $categoriesIds = self::getAllCategoriesIdsForCategoryByName($categoryName);

        if (!empty($categoriesIds)) {
            return self::getPropertiesForCategories($categoriesIds);
        } else {
            throw new Exception('EMPTY ITEM TYPES ARRAY!!!');
        }
    }

    public static function getAllCategoriesIdsForCategoryById($categoryId)
    {
        $parentsIds = array();
        while ($categoryId != null) {
            array_push($parentsIds, $categoryId);
            $category = self::getParentCategoryForCategoryById($categoryId);
            $categoryId = $category->getId();
        }

        return $parentsIds;
    }

    public static function getAllCategoriesForCategoryById($categoryId)
    {
        $category = self::getCategoryById($categoryId);

        $parents = array();
        while ($categoryId != null) {
            array_push($parents, $category);
            $category = self::getParentCategoryForCategoryById($categoryId);
            $categoryId = $category->getId();
        }

        return $parents;
    }

    public static function getAllCategoriesIdsForCategoryByName($categoryName)
    {
        $parentsIds = array();
        $categoryId = self::getCategoryIdForCategoryByName($categoryName);
        while ($categoryId != null) {
            array_push($parentsIds, $categoryId);
            $category = self::getParentCategoryForCategoryById($categoryId);
            $categoryId = $category->getId();
        }

        return $parentsIds;
    }

    public function getCategoryIdForCategoryByName($categoryName)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM "
            .self::$TABLE_CATEGORIES_NAME
            ." WHERE "
            .self::$TABLE_CATEGORIES_COLUMN_NAME."='$categoryName'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentCategoryId = $row[self::$TABLE_CATEGORIES_COLUMN_ID];
        }

        return $parentCategoryId;
    }

    public static function getParentCategoryForCategoryById($categoryId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_CATEGORIES_NAME." WHERE ".self::$TABLE_CATEGORIES_COLUMN_ID."='$categoryId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentCategoryId = $row[self::$TABLE_CATEGORIES_COLUMN_PARENT];
        }

        $parentCategory = self::getCategoryById($parentCategoryId);

        return $parentCategory;
    }

    public function getPropertiesForCategories($categoriesIds)
    {
        $inClause= implode(",", $categoriesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME." JOIN ".self::$TABLE_PROPERTIES_NAME
            ." ON ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_PROPERTY." = ".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID
            ." WHERE ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY
            ." IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $properties = array();
        while ($row = $result->fetch()) {
            $propertyId = $row[self::$TABLE_PROPERTIES_COLUMN_ID];
            $propertyName = $row[self::$TABLE_PROPERTIES_COLUMN_NAME];
            $urlPresentation = $row[self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }

    public function getPropertiesNamesForCategories($categoriesIds)
    {
        $inClause= implode(",", $categoriesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME
            ." JOIN ".self::$TABLE_PROPERTIES_NAME
            ." ON ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_PROPERTY." = ".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID
            ." WHERE ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY
            ." IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = $row[self::$TABLE_PROPERTIES_COLUMN_NAME];
        }

        return $propertiesList;
    }

    public function getJSONPropertiesForCategories($categoryName)
    {
        $categoriesIds = self::getAllCategoriesIdsForCategoryByName($categoryName);

        $inClause= implode(",", $categoriesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME
            ." JOIN ".self::$TABLE_PROPERTIES_NAME
            ." ON ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_PROPERTY." = ".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID
            ." WHERE ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY
            ." IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = new Property($row["property_id"], $row["property_name"], $row["url_presentation"]);
        }

        return json_encode($propertiesList);
    }

    public function saveJSONPropertiesForCategory($categoryName, $properties, $images)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM "
            .self::$TABLE_CATEGORIES_NAME
            ." WHERE "
            .self::$TABLE_CATEGORIES_COLUMN_NAME."='" .$categoryName."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $categoryId = $row[self::$TABLE_CATEGORIES_COLUMN_ID];
        }

        // insert into items
        $databaseConnection->query("INSERT INTO "
            .self::$TABLE_ITEMS_NAME
            ." (".self::$TABLE_ITEMS_COLUMN_CATEGORY.") VALUES ('" .$categoryId."');");

        // get itemId
        $result = $databaseConnection->query("SELECT LAST_INSERT_ID();");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $itemId = $row["LAST_INSERT_ID()"];
        }

        // save properties
        foreach ($properties as $property) {
            print_r($property);
            self::savePropertyWithValue($property, $itemId);
        }

        // save images
        self::setImagesForItem($images, $itemId);
    }

    private function savePropertyWithValue($property, $itemId)
    {
        $databaseConnection = self::getConnection();
        //$databaseConnection->query("UPDATE values_table SET values_table.value_v='".$property->property_value."';");
        $databaseConnection->query("INSERT INTO ".self::$TABLE_VALUES_NAME." (".self::$TABLE_VALUES_COLUMN_VALUE.") VALUES ('".$property->propertyValue."');");
        $databaseConnection->query("INSERT INTO ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME." (".
            self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM.", ".
            self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY.", ".
            self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE.") VALUES ('" .
            $itemId."','". $property->propertyId."', (SELECT LAST_INSERT_ID()));");
    }

    public function getAllForItem($itemId)
    {
        $databaseConnection = self::getConnection();

        // get category
        $result = $databaseConnection->query("SELECT * FROM ".
            self::$TABLE_ITEMS_NAME.
            " WHERE ".
            self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_ID."='".$itemId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categoryId = null;
        $discountPercent = null;
        while ($row = $result->fetch()) {
            $categoryId = $row[self::$TABLE_ITEMS_COLUMN_CATEGORY];
            $discountPercent = $row[self::$TABLE_ITEMS_COLUMN_DISCOUNT_PERCENT];
        }

        // get all types (objects) of item
        if ($categoryId == null) {
            return null;
        } else {
            $categories = self::getAllCategoriesForCategoryById($categoryId);

            $properties = self::getPropertiesToValuesForItem($itemId, $categories);


            $images = self::getImagesForItemById($itemId);

            //$discount = self::getDiscountByItemId($itemId);

            $item = new Item($itemId, $categories, $properties, $images, $discountPercent);

            return $item;
        }
    }

    private function getPropertiesToValuesForItem($itemId, $categories)
    {
        $categoriesIds = array();
        foreach ($categories as $category) {
            array_push($categoriesIds, $category->getId());
        }

        $properties = $this->getPropertiesForCategories($categoriesIds);
        $propertiesValues = array();

        $databaseConnection = self::getConnection();
        foreach ($properties as $property) {
            $result2 = $databaseConnection->query("SELECT * FROM "
                .self::$TABLE_ITEM_PROPERTY_VALUE_NAME
                ." WHERE "
                .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."='".$itemId
                ."' AND "
                .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."='".$property->getPropertyId()."';");
            $result2->setFetchMode(PDO::FETCH_ASSOC);
            $row2 = $result2->fetch();
            $valueId = $row2[self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE];
            $value = self::getValueById($valueId);

            $propertiesValues[] = new PropertyValue($property, $value);
        }

        return $propertiesValues;
    }

    private function getPropertyById($propertyId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_PROPERTIES_NAME." WHERE ".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID."='".$propertyId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyName = $row[self::$TABLE_PROPERTIES_COLUMN_NAME];
            $urlPresentation = $row[self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION];
            return new Property($propertyId, $propertyName, $urlPresentation);
        }
    }

    private function getValueById($valueId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_VALUES_NAME." WHERE ".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_ID."='".$valueId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $value = $row["value_v"];
            return new Value($valueId, $value);
        }
    }

    public function getItems() {
        // itemId, categoryId, categoryName, array({property_id, property_name, valueId, value_v});
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_ITEMS_NAME);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $itemsIds = array();
        while ($row = $result->fetch()) {
            $itemsIds[] = $row[self::$TABLE_ITEMS_COLUMN_ID];
        }

        $items = array();
        if (!empty($itemsIds)) {
            foreach ($itemsIds as $itemsId) {
                $items[] = DatabaseHandler::getAllForItem($itemsId);
            }
        } else {
            return null;
        }

        return $items;
    }

    public function getItemsByCategory($categoryId)
    {
        // MUST CONSIDER ALL THE SUCCESSORS!!!
        $categoriesIds = self::getSuccessorCategoriesIds($categoryId);
        array_push($categoriesIds, $categoryId);

        $inClause= implode(",", $categoriesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM "
            .self::$TABLE_ITEMS_NAME
            ." WHERE "
            .self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_CATEGORY
            ." IN (" .$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $itemsIds = array();
        while ($row = $result->fetch()) {
            $itemsIds[] = $row[self::$TABLE_ITEMS_COLUMN_ID];
        }

        $items = array();
        if (!empty($itemsIds)) {
            foreach ($itemsIds as $itemId) {
                $item = DatabaseHandler::getAllForItem($itemId);
                /*if (self::obj_in_array($item, $items)) {

                } else {
                    $items[] = $item;
                }*/
                $items[] = $item;
            }
        } else {
            return null;
        }


        return $items;
    }

    public function getSuccessorCategoriesIds($categoryId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM "
            .self::$TABLE_CATEGORIES_NAME
            ." WHERE "
            .self::$TABLE_CATEGORIES_COLUMN_PARENT."='" .$categoryId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categoriesIds = array();
        while ($row = $result->fetch()) {
            $categoryId = $row[self::$TABLE_CATEGORIES_COLUMN_ID];
            array_push($categoriesIds, $categoryId);
        }

        foreach ($categoriesIds as $categoriesId) {
            $childs = self::getSuccessorCategoriesIds($categoriesId);
            $categoriesIds = array_merge($categoriesIds, $childs);
        }

        return $categoriesIds;
    }

    public static function setPropertiesForItem($item)
    {
        //print_r($item);
        foreach ($item->properties as $prop) {
            if ($prop->value != null) {
                $val = $prop->value;
                if(isset($val->value)) {

                    $property = new Property($prop->property->propertyId, $prop->property->propertyName, $prop->property->urlPresentation);

                    $result = self::setPropertyValueForItem($item->id, $property, $val->value);
                    if ($result != true) {
                        return false; //failure
                    }
                }
            }
        }

        return true; // success
    }

    public function getValueIdByValue($value_v) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_VALUES_NAME." WHERE ".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_VALUE."='".$value_v."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $valueId = null;
        while ($row = $result->fetch()) {
            $valueId = $row[self::$TABLE_VALUES_COLUMN_ID];
        }

        return $valueId;
    }

    public function setPropertyValueForItem($itemId, $property, $value_v)
    {
        $databaseConnection = self::getConnection();

        //print_r($value);
        $valueId = self::getValueIdByValue($value_v);
        if ($valueId == null) {
            $databaseConnection->query("INSERT INTO ".self::$TABLE_VALUES_NAME." (".self::$TABLE_VALUES_COLUMN_VALUE.") VALUES ('".$value_v."');");
            $valueId = self::getValueIdByValue($value_v);
        }

        $count = 0;
        $result = $databaseConnection->query("SELECT COUNT(".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE.") FROM "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME .
            " WHERE " .
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."=" .$itemId
            ." AND ".
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."=" .$property->getPropertyId().";");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $count = $row['COUNT(value_v)'];

        if ($count == 0) {
            $databaseConnection->query("INSERT INTO ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.
                " (".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM.", ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY.", ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE.") ".
                "VALUES (".$itemId.", ".$property->getPropertyId().", ".$valueId.");");
        } else {
            $databaseConnection->query("UPDATE ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.
                " SET ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE."=".$valueId
                ." WHERE ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."=" .$itemId
                ." AND ".
                self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."=" .$property->getPropertyId().";");
        }

        return true;
    }

    public static function getFiltersForCategory($categoryId) {
        $filters = array();

        $categoriesIds = self::getAllCategoriesIdsForCategoryById($categoryId);

        if (!empty($categoriesIds)) {
            $properties = self::getPropertiesForCategories($categoriesIds);

            foreach ($properties as $property) {
                $possibleValuesOfProperty = self::getPossibleValuesForProperty($property, $categoryId);
                $filter = new Filter($property, $possibleValuesOfProperty);
                $filters[] = $filter;
            }

            return $filters;
        } else {
            throw new Exception('EMPTY ITEM TYPES ARRAY!!!');
        }
    }

    public static function getPossibleValuesForProperty($property, $categoryId)
    {
        // size filter values
        if (strcmp($property->getUrlPresentation(), "shoe_size") == 0) {
            $shoeSizes = ShoeSize::getSizes();
            $values = array();
            foreach ($shoeSizes as $shoeSize) {
                array_push($values, $shoeSize->getSizeName());
            }
            return $values;
        } else if (strcmp($property->getUrlPresentation(), "ball_size") == 0) {
            $ballSizes = BallSize::getSizes();
            $values = array();
            foreach ($ballSizes as $ballSize) {
                array_push($values, $ballSize->getSizeName());
            }
            return $values;
        } else if (strcmp($property->getUrlPresentation(), "clothing_size") == 0) {
            $clothingSizes = ClothingSize::getSizes();
            $values = array();
            foreach ($clothingSizes as $clothingSize) {
                array_push($values, $clothingSize->getSizeName());
            }
            return $values;
        }

        // other properties filter values
        $values = array();

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT DISTINCT "
            .self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_VALUE
            ." FROM (".
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME." JOIN ".self::$TABLE_VALUES_NAME
            ." ON ".
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE."=".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_ID
            .") JOIN ".
            self::$TABLE_ITEMS_NAME
            ." ON ".
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."=".self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_ID
            ." WHERE ".
            self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_CATEGORY."='".$categoryId."'"
            ." AND ".
            self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."='".$property->getPropertyId()."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            //$valueId = $row["value_id"];
            $value = $row[self::$TABLE_VALUES_COLUMN_VALUE];
            //$values[] = new Value($valueId, $value);
            if ($value != null && strlen($value) > 0) {
                $values[] = $value;
            }
        }

        return $values;
    }

    private static function obj_in_array($item, $items)
    {
        foreach ($items as $itemItem) {
            $propertiesAreEqual = true;
            $checkedProperties = self::getMeaningfullProperties();
            foreach ($checkedProperties as $checkedProperty) {
                $value = $item->getPropertyValueById($checkedProperty->getPropertyId());
                $itemValue = $itemItem->getPropertyValueById($checkedProperty->getPropertyId());

                if (strcmp($value, $itemValue) != 0) {
                    $propertiesAreEqual = false;
                    break;
                }
            }

            if ($propertiesAreEqual) {
                return true;
            }
        }

        return false;
    }

    private static function getCategoryById($categoryId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM "
            .self::$TABLE_CATEGORIES_NAME
            ." WHERE "
            .self::$TABLE_CATEGORIES_COLUMN_ID."='$categoryId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categoryName = "ware";
        $parentTypeId = null;
        $parentCategory = null;
        $urlPresentation = null;
        $shown = false;
        while ($row = $result->fetch()) {
            $categoryId = $row[self::$TABLE_CATEGORIES_COLUMN_ID];
            $categoryName = $row[self::$TABLE_CATEGORIES_COLUMN_NAME];
            $parentCategory = $row[self::$TABLE_CATEGORIES_COLUMN_PARENT];
            $urlPresentation = $row[self::$TABLE_CATEGORIES_COLUMN_URL_PRESENTATION];
            $shown = $row[self::$TABLE_CATEGORIES_COLUMN_SHOWN];
        }

        return new Category($categoryId, $categoryName, $parentCategory, $urlPresentation, $shown);
    }

    public function deleteItemById($itemId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("DELETE FROM "
            .self::$TABLE_ITEMS_NAME
            ." WHERE "
            .self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_ID."='$itemId'");

        $result = $databaseConnection->query("DELETE FROM "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME
            ." WHERE "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."='$itemId'");

        $result = $databaseConnection->query("DELETE FROM "
            .self::$TABLE_IMAGE_TO_ITEM_NAME
            ." WHERE "
            .self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_ITEM."='$itemId'");

        return true;
    }

    private function getImagesForItemById($itemId)
    {
        $databaseConnection = self::getConnection();
        //$result = $databaseConnection->query("SELECT DISTINCT values_table.value_v FROM ware_property_value JOIN values_table ON ware_property_value.value_v=values_table.value_id WHERE ware_property_value.property=8 AND ware_property_value.ware='$wareId'");
        $result = $databaseConnection->query("SELECT "
            .self::$TABLE_IMAGES_NAME.".".self::$TABLE_IMAGES_COLUMN_PATH
            ." FROM " .self::$TABLE_IMAGES_NAME." JOIN ".self::$TABLE_IMAGE_TO_ITEM_NAME
            ." ON ".self::$TABLE_IMAGES_NAME.".".self::$TABLE_IMAGES_COLUMN_ID."=".self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_IMAGE
            ." WHERE ".self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_ITEM."='$itemId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $images = array();
        while ($row = $result->fetch()) {
            $images[] = $row[self::$TABLE_IMAGES_COLUMN_PATH];
        }

        return $images;
    }

    public static function setImagesForItem($images, $itemId) {
        self::deleteImagesForItem($itemId);

        foreach ($images as $image) {
            $result = self::setImageForItem($image, $itemId);
            if ($result == false) {
                // failure
                return false;
            }
        }

        // success
        return true;
    }

    private function setImageForItem($imagePath, $itemId)
    {
        $databaseConnection = self::getConnection();

        $imageId = self::getImageIdByImagePath($imagePath);
        //echo $imagePath;
        if ($imageId == null) {
            $databaseConnection->query("INSERT INTO ".self::$TABLE_IMAGES_NAME." (".self::$TABLE_IMAGES_COLUMN_PATH.") VALUES ('".$imagePath."');");
            $imageId = self::getImageIdByImagePath($imagePath);
        }

        $exists = $databaseConnection->query("SELECT * FROM ".self::$TABLE_IMAGE_TO_ITEM_NAME.
            " WHERE ".self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_IMAGE."=".$imageId.
            " AND ".self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_ITEM."=".$itemId.";");
        if ($exists->rowCount() == 0) {
            $result2 = $databaseConnection->query("INSERT INTO ".self::$TABLE_IMAGE_TO_ITEM_NAME." (".self::$TABLE_IMAGE_TO_ITEM_COLUMN_IMAGE.", ".self::$TABLE_IMAGE_TO_ITEM_COLUMN_ITEM.") VALUES ('".$imageId."','".$itemId."');");
        }

        return true;

        /*if ($result2 != false) {
            return true;
        }
        return false;*/
    }

    public function getImageIdByImagePath($imagePath) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_IMAGES_NAME." WHERE ".self::$TABLE_IMAGES_NAME.".".self::$TABLE_IMAGES_COLUMN_PATH."='".$imagePath."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $imageId = null;
        while ($row = $result->fetch()) {
            $imageId = $row[self::$TABLE_IMAGES_COLUMN_ID];
        }

        return $imageId;
    }

    private function deleteImagesForItem($itemId)
    {
        $databaseConnection = self::getConnection();

        $result = $databaseConnection->query("DELETE FROM ".self::$TABLE_IMAGE_TO_ITEM_NAME." WHERE ".self::$TABLE_IMAGE_TO_ITEM_NAME.".".self::$TABLE_IMAGE_TO_ITEM_COLUMN_ITEM."='$itemId'");

        return true;
    }


    public static function getSame($itemId) {
        /*$databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_IMAGES_NAME." WHERE ".self::$TABLE_IMAGES_NAME.".".self::$TABLE_IMAGES_PATH."='".$imagePath."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $imageId = $row[self::$TABLE_IMAGES_ID];
        }

        return $imageId;*/
    }

    public function getMeaningfullProperties() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_PROPERTIES_NAME
            ." JOIN ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME
            ." ON ".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID." = ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_PROPERTY
            ." WHERE ".self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY."=1 AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'price' AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'description' AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'image';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyId = $row[self::$TABLE_PROPERTIES_COLUMN_ID];
            $propertyName = $row[self::$TABLE_PROPERTIES_COLUMN_NAME];
            $urlPresentation = $row[self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }

    public function getAllForItemByParams($params)
    {
        print_r($params);

        $conditions = array();
        foreach ($params as $param) {
            $conditions = "".self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_NAME."='".key($param)."'";
        }
        $whereClause = '';

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM (".self::$TABLE_PROPERTIES_NAME
            ." JOIN ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.
            " ON "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_ID."=".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY.
            ") JOIN ".self::$TABLE_VALUES_NAME
            ." ON ".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_ID."=".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE.
            " WHERE "
            .self::$TABLE_PROPERTY_TO_CATEGORY_NAME.".".self::$TABLE_PROPERTY_TO_CATEGORY_COLUMN_CATEGORY ."=1 AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'price' AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'description' AND "
            .self::$TABLE_PROPERTIES_NAME.".".self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION."<>'image';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyId = $row[self::$TABLE_PROPERTIES_COLUMN_ID];
            $propertyName = $row[self::$TABLE_PROPERTIES_COLUMN_NAME];
            $urlPresentation = $row[self::$TABLE_PROPERTIES_COLUMN_URL_PRESENTATION];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }

    // discounts
    private function getDiscountByItemId($itemId)
    {
        $databaseConnection = self::getConnection();

        $result = $databaseConnection->query("SELECT ".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_VALUE
            ." FROM ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME." JOIN ".self::$TABLE_VALUES_NAME
            ." ON ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE."=".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_ID
            ." WHERE "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."=4 AND "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."=" .$itemId.";");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $brand = $row[self::$TABLE_VALUES_COLUMN_VALUE];

        $result = $databaseConnection->query("SELECT ".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_VALUE
            ." FROM ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME." JOIN ".self::$TABLE_VALUES_NAME
            ." ON ".self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_VALUE."=".self::$TABLE_VALUES_NAME.".".self::$TABLE_VALUES_COLUMN_ID
            ." WHERE "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_PROPERTY."=5 AND "
            .self::$TABLE_ITEM_PROPERTY_VALUE_NAME.".".self::$TABLE_ITEM_PROPERTY_VALUE_COLUMN_ITEM."=" .$itemId.";");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $model = $row[self::$TABLE_VALUES_COLUMN_VALUE];

        return self::getDiscount($brand, $model);
    }
    public function getDiscounts()
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_DISCOUNTS_NAME.";");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $discounts = array();

        while ($row = $result->fetch()) {
            $brand = $row[self::$TABLE_DISCOUNTS_COLUMN_BRAND];
            $model = $row[self::$TABLE_DISCOUNTS_COLUMN_MODEL];
            $discountPercent = $row[self::$TABLE_DISCOUNTS_COLUMN_PERCENT];
            $discounts[] = new Discount($brand, $model, $discountPercent);
        }

        return $discounts;
    }
    public function getDiscount($brand, $model)
    {
        $databaseConnection = self::getConnection();

        $result = $databaseConnection->query("SELECT ".self::$TABLE_DISCOUNTS_NAME.".".self::$TABLE_DISCOUNTS_COLUMN_PERCENT
            ." FROM ".self::$TABLE_DISCOUNTS_NAME
            ." WHERE ".self::$TABLE_DISCOUNTS_NAME.".".self::$TABLE_DISCOUNTS_COLUMN_BRAND."='".$brand
            ."' AND ".self::$TABLE_DISCOUNTS_NAME.".".self::$TABLE_DISCOUNTS_COLUMN_MODEL."='".$model."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $discountPercent = $row[self::$TABLE_DISCOUNTS_COLUMN_PERCENT];

        return $discountPercent;
    }
    public function setDiscount($itemId, $discountPercent)
    {
        $databaseConnection = self::getConnection();

        /*$valueId = self::getValueIdByValue($value->getValue());
        if ($valueId == null) {
            $databaseConnection->query("INSERT INTO discounts_table (value_v) VALUES ('".$value->getValue()."');");
            $valueId = self::getValueIdByValue($value->getValue());
        }*/

        $databaseConnection->query("UPDATE ".self::$TABLE_ITEMS_NAME
            ." SET ".self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_DISCOUNT_PERCENT."=".$discountPercent
            ." WHERE ".self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_ID."='".$itemId."';");

        return true;
    }
    public function deleteDiscount($brand, $model)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("DELETE FROM ".self::$TABLE_DISCOUNTS_NAME
            ." WHERE ".self::$TABLE_DISCOUNTS_NAME.".".self::$TABLE_DISCOUNTS_COLUMN_BRAND."='".$brand
            ."' AND ".self::$TABLE_DISCOUNTS_NAME.".".self::$TABLE_DISCOUNTS_COLUMN_MODEL."='".$model."';");

        return true;
    }
    public function addDiscount($brand, $model, $discountPercent)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("INSERT INTO ".self::$TABLE_DISCOUNTS_NAME." (".self::$TABLE_DISCOUNTS_COLUMN_BRAND.", ".self::$TABLE_DISCOUNTS_COLUMN_MODEL.", ".self::$TABLE_DISCOUNTS_COLUMN_PERCENT.") VALUES ('".$brand."','".$model."','".$discountPercent."');");
    }
    //

    // popular categories
    public function addPopularCategory($name, $url, $image)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("INSERT INTO ".self::$TABLE_POPULAR_CATEGORIES_NAME ." ("
            .self::$TABLE_POPULAR_CATEGORIES_COLUMN_NAME .", "
            .self::$TABLE_POPULAR_CATEGORIES_COLUMN_URL .", "
            .self::$TABLE_POPULAR_CATEGORIES_COLUMN_IMAGE.") VALUES ('".$name."','".$url."','".$image."');");
    }
    public function deletePopularCategory($name, $url, $image)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("DELETE FROM ".self::$TABLE_POPULAR_CATEGORIES_NAME
            ." WHERE ".self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_NAME."='".$name
            ."' AND ".self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_URL."='".$url
            ."' AND ".self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_IMAGE."='".$image."';");

        return true;
    }
    public function setPopularCategory($id, $name, $url, $image)
    {
        $databaseConnection = self::getConnection();

        /*$valueId = self::getValueIdByValue($value->getValue());
        if ($valueId == null) {
            $databaseConnection->query("INSERT INTO discounts_table (value_v) VALUES ('".$value->getValue()."');");
            $valueId = self::getValueIdByValue($value->getValue());
        }*/

        $databaseConnection->query("UPDATE ".self::$TABLE_POPULAR_CATEGORIES_NAME
            ." SET "
            .self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_NAME."='".$name."', "
            .self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_URL."='".$url."', "
            .self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_IMAGE."='".$image
            ."' WHERE "
            .self::$TABLE_POPULAR_CATEGORIES_NAME.".".self::$TABLE_POPULAR_CATEGORIES_COLUMN_ID."='".$id."';");

        return true;
    }
    public function getPopularCategories()
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".self::$TABLE_POPULAR_CATEGORIES_NAME.";");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categories = array();

        while ($row = $result->fetch()) {
            $id = $row[self::$TABLE_POPULAR_CATEGORIES_COLUMN_ID];
            $name = $row[self::$TABLE_POPULAR_CATEGORIES_COLUMN_NAME];
            $url = $row[self::$TABLE_POPULAR_CATEGORIES_COLUMN_URL];
            $image = $row[self::$TABLE_POPULAR_CATEGORIES_COLUMN_IMAGE];
            $categories[] = new PopularCategory($id, $name, $url, $image);
        }

        return $categories;
    }

    public static function getVideos()
    {
        return array();
    }

    public function createItemOfCategory($categoryId)
    {
        // insert into items
        $databaseConnection = self::getConnection();
        $databaseConnection->query("INSERT INTO "
            .self::$TABLE_ITEMS_NAME
            ." (".self::$TABLE_ITEMS_COLUMN_CATEGORY.") VALUES ('" .$categoryId."');");

        // get itemId
        $result = $databaseConnection->query("SELECT LAST_INSERT_ID();");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $itemId = $row["LAST_INSERT_ID()"];
        }

        //this->self::getPropertiesForCategory()

        return $itemId;
    }

    public function getMostPopularItemsIds($count)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ".
            self::$TABLE_ITEMS_NAME.
            " ORDER BY ".
            self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_VISITS_COUNT." DESC".
            " LIMIT ".$count.";");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $ids = array();
        while ($row = $result->fetch()) {
            $ids[] = $row[self::$TABLE_ITEMS_COLUMN_ID];
        }

        return $ids;
    }

    public function getMostPopularItems($count) {
        $mostPopularItemsIds = self::getMostPopularItemsIds($count);
        $mostPopularItems = array();
        foreach ($mostPopularItemsIds as $mostPopularItemsId) {
            $mostPopularItems[] = self::getAllForItem($mostPopularItemsId);
        }

        return $mostPopularItems;
    }

    public function incrementItemVisits($itemId)
    {
        //UPDATE Orders SET Quantity = Quantity + 1 WHERE ...
        $databaseConnection = self::getConnection();
        $databaseConnection->query("UPDATE ".self::$TABLE_ITEMS_NAME.
            " SET ".
            self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_VISITS_COUNT."=".
            self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_VISITS_COUNT." + 1".
            " WHERE "
            .self::$TABLE_ITEMS_NAME.".".self::$TABLE_ITEMS_COLUMN_ID."='".$itemId."';");

        return true;
    }
}