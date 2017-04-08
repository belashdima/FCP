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

DatabaseHandler::getConnection();
print_r(DatabaseHandler::getBrands());
print_r(DatabaseHandler::getGroundTypes());
print_r(DatabaseHandler::getShoeSizes());

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
                echo "Connected successfully";
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

    static public function getBrands() {
        $databaseConnection = self::getConnection();
        $result = $databaseConnection->query("SELECT * FROM brands_table");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $brandsList[] = new Brand($row["brand_id"], $row["brand_name"]);
        }

        return $brandsList;
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
}