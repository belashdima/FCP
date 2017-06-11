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
        $wareTypesIds = self::getAllWareTypesForWareType($wareTypeName);

        if (!empty($wareTypesIds)) {
            self::getPropertiesForWareTypes($wareTypesIds);
        } else {
            throw new Exception('EMPTY WARE TYPES ARRAY!!!');
        }
    }

    public static function getAllWareTypesForWareType($wareTypeName)
    {
        $parentsIds = array();
        $wareTypeId = self::getWareTypeForWareTypeByName($wareTypeName);
        while ($wareTypeId != null) {
            array_push($parentsIds, $wareTypeId);
            $wareTypeId = self::getParentTypeForWareTypeById($wareTypeId);
        }

        return $parentsIds;
    }

    public static function getWareTypeForWareTypeByName($wareTypeName)
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
        $wareTypesIds = self::getAllWareTypesForWareType($wareTypeName);

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
}