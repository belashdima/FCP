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
require_once "BootsPair.php";
require_once "BootsModel.php";
require_once "WareType.php";
require_once "Property.php";
require_once "Ware.php";
require_once "Value.php";
require_once "PropertyValue.php";

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

    static public function getBrands() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM brands_table");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $brandsList[] = new Brand($row["brand_id"], $row["brand_name"]);
        }

        return $brandsList;
    }

    static public function getBrandById($brandId) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM brands_table WHERE brands_table.brand_id=$brandId");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $brand = new Brand($row["brand_id"], $row["brand_name"]);
        }

        return $brand;
    }

    static public function getGroundTypes() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ground_types_table");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $groundTypesList[] = new GroundType($row["ground_type_id"], $row["ground_type_name"]);
        }

        return $groundTypesList;
    }

    static public function getShoeSizes() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM sizes_table");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $sizesList[] = new ShoeSize($row["size_id"], $row["size_eu"], $row["size_uk"], $row["size_us"]);
        }

        return $sizesList;
    }

    static public function getBoots() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM boots_table ");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $bootsList[] = new BootsPair($row["boots_id"], $row["boots_size"], $row["boots_model"], $row["boots_price"]);
        }

        return $bootsList;
    }

    static public function getBootsModels() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM models_table ");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $bootsModelsList[] = new BootsModel($row["model_id"], $row["model_name"], $row["model_brand"], $row["model_price"], $row["model_description"]);
        }

        return $bootsModelsList;
    }

    public static function getImagesByModelId($modelId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM images_table WHERE images_table.model=$modelId");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $imagesList[] = $row["image_path"];
        }

        return $imagesList;
    }

    public static function getModelById($modelId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM models_table WHERE models_table.model_id=$modelId");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $model = new BootsModel($row["model_id"], $row["model_name"], $row["model_brand"], $row["model_price"], $row["model_description"]);
        }

        return $model;
    }

    public static function setBrandToModel($modelId, $brandId) {
        $databaseConnection = self::getConnection();

        //$databaseConnection->query("SELECT * FROM models_table WHERE models_table.model_id=$modelId");
        $databaseConnection->query("UPDATE models_table SET models_table.model_brand=$brandId WHERE models_table.model_id=$modelId");

        return true;
    }

    public static function getBrandByName($brandName) {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM brands_table WHERE brands_table.brand_name='".$brandName."'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $brand = new Brand($row["brand_id"], $row["brand_name"]);
        }

        return $brand;
    }

    public static function setNameToModel($modelId, $modelName) {
        $databaseConnection = self::getConnection();

        //$databaseConnection->query("SELECT * FROM models_table WHERE models_table.model_id=$modelId");
        $databaseConnection->query("UPDATE models_table SET models_table.model_name='".$modelName."' WHERE models_table.model_id=$modelId");

        return true;
    }

    public static function setPriceToModel($modelId, $modelPrice) {
        $databaseConnection = self::getConnection();

        //$databaseConnection->query("SELECT * FROM models_table WHERE models_table.model_id=$modelId");
        $databaseConnection->query("UPDATE models_table SET models_table.model_price='".$modelPrice."' WHERE models_table.model_id=$modelId");

        return true;
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
        $wareTypesIds = self::getAllWareTypesForWareTypeByName($wareTypeName);

        if (!empty($wareTypesIds)) {
            self::getPropertiesForWareTypes($wareTypesIds);
        } else {
            throw new Exception('EMPTY WARE TYPES ARRAY!!!');
        }
    }

    public static function getAllWareTypesForWareTypeById($wareTypeId)
    {
        $parentsIds = array();
        while ($wareTypeId != null) {
            array_push($parentsIds, $wareTypeId);
            $wareTypeId = self::getParentTypeForWareTypeById($wareTypeId);
        }

        return $parentsIds;
    }

    public static function getAllWareTypesForWareTypeByName($wareTypeName)
    {
        $parentsIds = array();
        $wareTypeId = self::getWareTypeIdForWareTypeByName($wareTypeName);
        while ($wareTypeId != null) {
            array_push($parentsIds, $wareTypeId);
            $wareTypeId = self::getParentTypeForWareTypeById($wareTypeId);
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
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_type_id='$wareTypeId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $parentTypeId = $row["parent_type"];
        }

        return $parentTypeId;
    }

    public static function getPropertiesForWareTypes($wareTypesIds)
    {
        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM property_to_ware_type JOIN properties ON property_to_ware_type.property = properties.property_id
WHERE property_to_ware_type.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = $row["property_id"];
        }

        return $propertiesList;
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
        $wareTypesIds = self::getAllWareTypesForWareTypeByName($wareTypeName);

        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM property_to_ware_type JOIN properties ON property_to_ware_type.property = properties.property_id
WHERE property_to_ware_type.ware_type IN (".$inClause.");");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $propertiesList[] = array('property_id'=>$row["property_id"], 'property_name'=>$row["property_name"]);
        }

        return json_encode($propertiesList);
    }

    public static function saveJSONPropertiesForWareType($wareTypeName, $properties)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM ware_types WHERE ware_types.ware_type_name='".$wareTypeName."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypeId = $row["ware_type_id"];
        }

        // insert into wares
        $databaseConnection->query("INSERT INTO wares (type) VALUES ('".$wareTypeId."');");

        // get wareId
        $result = $databaseConnection->query("SELECT LAST_INSERT_ID();");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareId = $row["LAST_INSERT_ID()"];
        }

        echo $wareId;

        foreach ($properties as $property) {
            self::savePropertyWithValue($property, $wareId);
        }
    }

    private static function savePropertyWithValue($property, $wareId)
    {
        //echo '='.$property->property_value;
        $databaseConnection = self::getConnection();
        //$databaseConnection->query("UPDATE values_table SET values_table.value_v='".$property->property_value."';");
        $databaseConnection->query("INSERT INTO values_table (value_v) VALUES ('".$property->property_value."');");
        $databaseConnection->query("INSERT INTO ware_property_value (ware, property, value_v) VALUES ('".$wareId."','".$property->property_id."', (SELECT LAST_INSERT_ID()));");
    }

    public static function getAllForWare($wareId)
    {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM wares WHERE wares.ware_id='".$wareId."';");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $wareTypeId = $row["type"];
        }
        $wareTypes = self::getAllWareTypesForWareTypeById($wareTypeId);
        //print_r( $wareTypes);

        $properties = self::getPropertyToValueForWare($wareId);

        $ware = new Ware($wareId, $wareTypes, $properties);

        return $ware;
    }

    private static function getPropertyToValueForWare($wareId)
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
            return new Property($propertyId, $propertyName);
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

    public static function getWaresOfType($wareTypeId)
    {
        // MUST CONSIDER ALL THE SUCCESSORS!!!
        $wareTypesIds = self::getSuccessorWareTypesIds($wareTypeId);
        array_push($wareTypesIds, $wareTypeId);

        $inClause= implode(",", $wareTypesIds);

        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM wares WHERE wares.type IN (".$inClause.");");
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
}