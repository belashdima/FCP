<?php

require_once "Size.php";

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class ShoeSize extends Size
{
    public $sizeEu;
    public $sizeUk;
    public $sizeUs;

    public function __construct($sizeId, $sizeEu, $sizeUk, $sizeUs)
    {
        $this->sizeId = $sizeId;
        $this->sizeEu = $sizeEu;
        $this->sizeUk = $sizeUk;
        $this->sizeUs = $sizeUs;

        $this->sizeName = "UK: ".$this->sizeUk."   EU: ".$this->sizeEu."   US: ".$this->sizeUs;
    }

    public static function getShoeSizeById($sizeId)
    {
        return (new DatabaseHandler())->getShoeSizeById($sizeId);
    }

    public function getSizeEu()
    {
        return $this->sizeEu;
    }

    public function getSizeUk()
    {
        return $this->sizeUk;
    }

    public function getSizeUs()
    {
        return $this->sizeUs;
    }

    function __toString()
    {
        return "UK: ".$this->sizeUk."   EU: ".$this->sizeEu."   US: ".$this->sizeUs;
    }

    public static function decodeSizesFromString($sizesString) {
        $sizesList = array();
        foreach (json_decode($sizesString) as $size) {
            array_push($sizesList, new ShoeSize($size->sizeId, $size->sizeEu, $size->sizeUk, $size->sizeUs));
        }
        return $sizesList;
    }

    public static function encodeSizesToString($sizesArray) {
        return json_encode($sizesArray);
    }

    public static function getSizes()
    {
        return (new DatabaseHandler())->getShoeSizes();
    }
}