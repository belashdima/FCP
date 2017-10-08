<?php

require_once "ClothingSize.php";
require_once "BallSize.php";
require_once "ShoeSize.php";

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class SizeOfItem
{
    public $size;
    public $quantity;

    public function __construct($size, $quantity)
    {
        $this->size = $size;
        $this->quantity = $quantity;
    }

    public static function decodeSizesOfItemFromString($sizesString) {
        $sizesList = array();
        foreach (json_decode($sizesString) as $size) {
            array_push($sizesList, new ShoeSize($size->sizeId, $size->sizeEu, $size->sizeUk, $size->sizeUs));
        }
        return $sizesList;
    }

    public static function encodeSizesOfItemToString($sizesArray) {
        return json_encode($sizesArray);
    }

    public static function decodeBallSizesFromString($ballSizesString) {
        $ballSizesList = array();
        foreach (json_decode($ballSizesString) as $ballSize) {
            array_push($ballSizesList, new ShoeSize($size->sizeId, $size->sizeEu, $size->sizeUk, $size->sizeUs));
        }
        return $sizesList;
    }

    public static function encodeBallSizesToString($ballsSizesArray) {
        return json_encode($ballsSizesArray);
    }

    public static function getEmptyShoeSizes()
    {
        $shoeSizes = array();
        foreach (ShoeSize::getSizes() as $shoeSize) {
            array_push($shoeSizes, new SizeOfItem($shoeSize, 0));
        }
        return $shoeSizes;
    }

    public static function getEmptyBallSizes()
    {
        $ballSizes = array();
        foreach (BallSize::getSizes() as $ballSize) {
            array_push($ballSizes, new SizeOfItem($ballSize, 0));
        }
        return $ballSizes;
    }

    public static function getEmptyClothingSizes()
    {
        $clothingSizes = array();
        foreach (ClothingSize::getSizes() as $clothingSize) {
            array_push($clothingSizes, new SizeOfItem($clothingSize, 0));
        }
        return $clothingSizes;
    }
}