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
require_once "Model.php";

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
            $model = new Model($row["model_id"], $row["model_name"], $row["model_brand"], $row["model_price"], $row["model_description"]);
        }

        return $model;
    }
}