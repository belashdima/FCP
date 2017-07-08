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
require_once "WareType.php";
require_once "Property.php";
require_once "Ware.php";
require_once "Value.php";
require_once "PropertyValue.php";
require_once "Filter.php";

/*DatabaseHandler::getConnection();
print_r(DatabaseHandler::getBrands());
print_r(DatabaseHandler::getGroundTypes());
print_r(DatabaseHandler::getShoeSizes());
print_r(DatabaseHandler::getBoots());
print_r(DatabaseHandler::getModelById(1));
print_r(DatabaseHandler::getImagesByModelId(1));*/

class DatabaseHandler
{
    static private $connection;

    private function __construct()
    {
        echo self::getConnection();
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
                //echo "Connection failed: " . $e->getMessage();
            }
        } else {
            return self::$connection;
        }
    }

    static public function getShoeSizes() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM shoe_sizes_table");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $sizesList[] = new ShoeSize($row["size_id"], $row["size_eu"], $row["size_uk"], $row["size_us"]);
        }

        return $sizesList;
    }

    public static function getAllWareTypes() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types ");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypesList[] = new WareType($row["ware_type_id"], $row["ware_type_name"], $row["parent_type"]);
        }

        return $wareTypesList;
    }

    public static function getPropertiesForWareType($wareTypeName)
    {
        $wareTypesIds = self::getAllWareTypesIdsForWareTypeByName($wareTypeName);

        if (!empty($wareTypesIds)) {
            return self::getPropertiesForWareTypes($wareTypesIds);
        } else {
            throw new Exception('EMPTY WARE TYPES ARRAY!!!');
        }
    }

    public static function getAllWareTypesIdsForWareTypeById($wareTypeId)
    {
        $parentsIds = array();
        while ($wareTypeId != null) {
            array_push($parentsIds, $wareTypeId);
            $wareType = self::getParentTypeForWareTypeById($wareTypeId);
            $wareTypeId = $wareType->getId();
        }

        return $parentsIds;
    }

    public static function getAllWareTypesForWareTypeById($wareTypeId)
    {
        $wareType = self::getWareTypeById($wareTypeId);

        $parents = array();
        while ($wareTypeId != null) {
            array_push($parents, $wareType);
            $wareType = self::getParentTypeForWareTypeById($wareTypeId);
            $wareTypeId = $wareType->getId();
        }

        return $parents;
    }

    public static function getAllWareTypesIdsForWareTypeByName($wareTypeName)
    {
        $parentsIds = array();
        $wareTypeId = self::getWareTypeIdForWareTypeByName($wareTypeName);
        while ($wareTypeId != null) {
            array_push($parentsIds, $wareTypeId);
            $wareType = self::getParentTypeForWareTypeById($wareTypeId);
            $wareTypeId = $wareType->getId();
        }

        return $parentsIds;
    }

    public static function getWareTypeIdForWareTypeByName($wareTypeName)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_type_name='$wareTypeName'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentTypeId = $row["ware_type_id"];
        }

        return $parentTypeId;
    }

    public static function getParentTypeForWareTypeById($wareTypeId)
    {
        /*$databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_type_id='$wareTypeId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentTypeId = $row["parent_type"];
        }

        return $parentTypeId;*/

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_type_id='$wareTypeId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentTypeId = $row["parent_type"];
        }

        $parentType = self::getWareTypeById($parentTypeId);

        return $parentType;
    }

    public static function getPropertiesForWareTypes($wareTypesIds)
    {
        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM property_to_ware_type JOIN properties ON property_to_ware_type.property = properties.property_id
WHERE property_to_ware_type.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyId = $row["property_id"];
            $propertyName = $row["property_name"];
            $urlPresentation = $row["url_presentation"];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }

    public static function getPropertiesNamesForWareTypes($wareTypesIds)
    {
        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM property_to_ware_type JOIN properties ON property_to_ware_type.property = properties.property_id
WHERE property_to_ware_type.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = $row["property_name"];
        }

        return $propertiesList;
    }

    public static function getJSONPropertiesForWareTypes($wareTypeName)
    {
        $wareTypesIds = self::getAllWareTypesIdsForWareTypeByName($wareTypeName);

        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM property_to_ware_type JOIN properties ON property_to_ware_type.property = properties.property_id
WHERE property_to_ware_type.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = new Property($row["property_id"], $row["property_name"], $row["url_presentation"]);
        }

        return json_encode($propertiesList);
    }

    public static function saveJSONPropertiesForWareType($wareTypeName, $properties, $images)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_types.ware_type_name='".$wareTypeName."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypeId = $row["ware_type_id"];
        }

        // insert into wares
        $databaseConnection->query("INSERT INTO wares (ware_type) VALUES ('".$wareTypeId."');");

        // get wareId
        $result = $databaseConnection->query("SELECT LAST_INSERT_ID();");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareId = $row["LAST_INSERT_ID()"];
        }

        // save properties
        foreach ($properties as $property) {
            print_r($property);
            self::savePropertyWithValue($property, $wareId);
        }

        // save images
        self::setImagesForWare($images, $wareId);
    }

    private static function savePropertyWithValue($property, $wareId)
    {
        //echo '='.$property->property_value;
        $databaseConnection = self::getConnection();
        //$databaseConnection->query("UPDATE values_table SET values_table.value_v='".$property->property_value."';");
        $databaseConnection->query("INSERT INTO values_table (value_v) VALUES ('".$property->propertyValue."');");
        $databaseConnection->query("INSERT INTO ware_property_value (ware, property, value_v) VALUES ('".$wareId."','".$property->propertyId."', (SELECT LAST_INSERT_ID()));");
    }

    public static function getAllForWare($wareId)
    {
        $databaseConnection = self::getConnection();

        // get wareType
        $result = $databaseConnection->query("SELECT * FROM wares WHERE wares.ware_id='".$wareId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypeId = $row["ware_type"];
        }

        // get all types (objects) of ware
        $wareTypes = self::getAllWareTypesForWareTypeById($wareTypeId);
        //print_r( $wareTypes);

        $properties = self::getPropertiesToValuesForWare($wareId);
        
        $images = self::getImagesForWareById($wareId);

        $ware = new Ware($wareId, $wareTypes, $properties, $images);

        return $ware;
    }

    private static function getPropertiesToValuesForWare($wareId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_property_value WHERE ware_property_value.ware='".$wareId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $properties = array();
        while ($row = $result->fetch()) {
            $propertyId = $row["property"];
            $property = self::getPropertyById($propertyId);
            $valueId = $row["value_v"];
            $value = self::getValueById($valueId);

            $properties[] = new PropertyValue($property, $value);
        }

        return $properties;
    }

    private static function getPropertyById($propertyId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM properties WHERE properties.property_id='".$propertyId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyName = $row["property_name"];
            $urlPresentation = $row["url_presentation"];
            return new Property($propertyId, $propertyName, $urlPresentation);
        }
    }

    private static function getValueById($valueId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM values_table WHERE values_table.value_id='".$valueId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $value = $row["value_v"];
            return new Value($valueId, $value);
        }
    }

    public static function getWares() {
        // wareId, wareTypeId, wareTypeName, array({property_id, property_name, valueId, value_v});
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM wares");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $waresIds[] = $row["ware_id"];
        }

        $wares = array();
        if (count($waresIds)>0) {
            foreach ($waresIds as $wareId) {
                $wares[] = DatabaseHandler::getAllForWare($wareId);
            }
        } else {
            return null;
        }

        return $wares;
    }

    public static function getWaresOfType($wareTypeId, $showOnlyUnique = false)
    {
        // MUST CONSIDER ALL THE SUCCESSORS!!!
        $wareTypesIds = self::getSuccessorWareTypesIds($wareTypeId);
        array_push($wareTypesIds, $wareTypeId);

        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM wares WHERE wares.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $waresIds[] = $row["ware_id"];
        }

        $wares = array();
        if (count($waresIds)>0) {
            foreach ($waresIds as $wareId) {
                $ware = DatabaseHandler::getAllForWare($wareId);
                if ($showOnlyUnique && self::obj_in_array($ware, $wares)) {

                } else {
                    $wares[] = $ware;
                }
                //$wares[] = $ware;
            }
        } else {
            return null;
        }


        return $wares;
    }

    public static function getSuccessorWareTypesIds($wareTypeId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_types.parent_type='".$wareTypeId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $waresTypesIds = array();
        while ($row = $result->fetch()) {
            $wareTypeId = $row["ware_type_id"];
            array_push($waresTypesIds, $wareTypeId);
        }

        foreach ($waresTypesIds as $wareType) {
            //echo 'wareType: '.$wareType."\r\n";
            $childs = self::getSuccessorWareTypesIds($wareType);
            /*echo 'childs for it: ';
            echo print_r($childs);
            echo "\r\n";*/
            $waresTypesIds = array_merge($waresTypesIds, $childs);
            /*echo 'Result array : ';
            echo print_r($waresTypesIds);
            echo "\r\n";*/
        }

        return $waresTypesIds;
    }

    public static function setPropertiesForWare($ware)
    {
        foreach ($ware->properties as $prop) {
            self::setPropertyValueForWare($ware->wareId,
                new Property($prop->property->propertyId, $prop->property->propertyName, $prop->property->urlPresentation),
                new Value($prop->value->valueId, $prop->value->value));
        }

        /*foreach ($ware->images as $image) {
            self::se
        }*/
    }

    public static function getValueIdByValue($value_v) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM values_table WHERE values_table.value_v='".$value_v."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $valueId = $row["value_id"];
        }

        return $valueId;
    }

    private static function setPropertyValueForWare($wareId, $property, $value)
    {
        $databaseConnection = self::getConnection();

        //print_r($value);
        $valueId = self::getValueIdByValue($value->getValue());
        if ($valueId == null) {
            $databaseConnection->query("INSERT INTO values_table (value_v) VALUES ('".$value->getValue()."');");
            $valueId = self::getValueIdByValue($value->getValue());
        }

        $databaseConnection->query("UPDATE ware_property_value SET ware_property_value.value_v=".$valueId." WHERE ware_property_value.ware=".$wareId." AND ware_property_value.property=".$property->getPropertyId().";");

        return true;
    }

    public static function getFiltersForWareType($wareTypeId) {
        $filters = array();

        $wareTypesIds = self::getAllWareTypesIdsForWareTypeById($wareTypeId);

        if (!empty($wareTypesIds)) {
            $properties = self::getPropertiesForWareTypes($wareTypesIds);

            foreach ($properties as $property) {
                $possibleValuesOfProperty = self::getPossibleValuesForProperty($property);
                $filter = new Filter($property, $possibleValuesOfProperty);
                $filters[] = $filter;
            }

            return $filters;
        } else {
            throw new Exception('EMPTY WARE TYPES ARRAY!!!');
        }
    }

    public static function getPossibleValuesForProperty($property)
    {
        $values = array();

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT DISTINCT values_table.value_v FROM ware_property_value JOIN values_table ON ware_property_value.value_v=values_table.value_id WHERE ware_property_value.property='".$property->getPropertyId()."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            //$valueId = $row["value_id"];
            $value = $row["value_v"];
            //$values[] = new Value($valueId, $value);
            $values[] = $value;
        }

        return $values;
    }

    private static function obj_in_array($ware, $wares)
    {
        foreach ($wares as $wareItem) {
            $propertiesAreEqual = true;
            $checkedProperties = self::getMeaningfullProperties();
            foreach ($checkedProperties as $checkedProperty) {
                $value = $ware->getPropertyValueById($checkedProperty->getPropertyId());
                $itemValue = $wareItem->getPropertyValueById($checkedProperty->getPropertyId());

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

    private static function getWareTypeById($wareTypeId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_type_id='$wareTypeId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypeId = $row["ware_type_id"];
            $wareTypeName = $row["ware_type_name"];
            $parentTypeId = $row["parent_type"];
        }

        return new WareType($wareTypeId, $wareTypeName, $parentTypeId);
    }

    public static function deleteWareById($wareId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("DELETE FROM wares WHERE wares.ware_id='$wareId'");

        $result = $databaseConnection->query("DELETE FROM ware_property_value WHERE ware_property_value.ware='$wareId'");

        $result = $databaseConnection->query("DELETE FROM image_to_ware WHERE image_to_ware.ware='$wareId'");

        return true;
    }

    private static function getImagesForWareById($wareId)
    {
        $databaseConnection = self::getConnection();
        //$result = $databaseConnection->query("SELECT DISTINCT values_table.value_v FROM ware_property_value JOIN values_table ON ware_property_value.value_v=values_table.value_id WHERE ware_property_value.property=8 AND ware_property_value.ware='$wareId'");
        $result = $databaseConnection->query("SELECT images.image_path FROM images JOIN image_to_ware ON images.image_id=image_to_ware.image WHERE image_to_ware.ware='$wareId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $images = array();
        while ($row = $result->fetch()) {
            $images[] = $row["image_path"];
        }

        return $images;
    }

    public static function setImagesForWare($images, $wareId) {
        self::deleteImagesForWare($wareId);

        foreach ($images as $image) {
            $result = self::setImageForWare($image, $wareId);
            if ($result == false) {
                // failure
                return false;
            }
        }

        // success
        return true;
    }

    public static function setImageForWare($imagePath, $wareId)
    {
        $databaseConnection = self::getConnection();

        $imageId = self::getImageIdByImagePath($imagePath);
        echo $imagePath;
        if ($imageId == null) {
            $databaseConnection->query("INSERT INTO images (image_path) VALUES ('".$imagePath."');");
            $imageId = self::getImageIdByImagePath($imagePath);
        }

        $exists = $databaseConnection->query("SELECT * FROM image_to_ware WHERE image_to_ware.image=".$imageId." AND image_to_ware.ware=".$wareId.";");
        if ($exists->rowCount() == 0) {
            $result2 = $databaseConnection->query("INSERT INTO image_to_ware (image, ware) VALUES ('".$imageId."','".$wareId."');");
        }

        return true;

        /*if ($result2 != false) {
            return true;
        }
        return false;*/
    }

    public static function getImageIdByImagePath($imagePath) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM images WHERE images.image_path='".$imagePath."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $imageId = $row["image_id"];
        }

        return $imageId;
    }

    private static function deleteImagesForWare($wareId)
    {
        $databaseConnection = self::getConnection();

        $result = $databaseConnection->query("DELETE FROM image_to_ware WHERE image_to_ware.ware='$wareId'");

        return true;
    }

    public static function getSame($wareId) {
        /*$databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM images WHERE images.image_path='".$imagePath."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $imageId = $row["image_id"];
        }

        return $imageId;*/
    }

    public static function getMeaningfullProperties() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM properties JOIN property_to_ware_type ON properties.property_id = property_to_ware_type.property WHERE property_to_ware_type.ware_type=1 AND properties.url_presentation<>'price' AND properties.url_presentation<>'description' AND properties.url_presentation<>'image';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyId = $row["property_id"];
            $propertyName = $row["property_name"];
            $urlPresentation = $row["url_presentation"];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }

    public static function getAllForWareByParams($params)
    {
        print_r($params);

        $conditions = array();
        foreach ($params as $param) {
            $conditions = "properties.property_name='".key($param)."'";
        }
        $whereClause = '';

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM (properties JOIN ware_property_value ON properties.property_id=ware_property_value.property) JOIN values_table ON values_table.value_id=ware_property_value.value_v WHERE property_to_ware_type.ware_type=1 AND properties.url_presentation<>'price' AND properties.url_presentation<>'description' AND properties.url_presentation<>'image';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertyId = $row["property_id"];
            $propertyName = $row["property_name"];
            $urlPresentation = $row["url_presentation"];
            $properties[] = new Property($propertyId, $propertyName, $urlPresentation);
        }

        return $properties;
    }
}