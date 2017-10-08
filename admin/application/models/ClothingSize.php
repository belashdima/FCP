<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class ClothingSize extends Size
{
    public function __construct($sizeId, $sizeName)
    {
        $this->sizeId = $sizeId;
        $this->sizeName = $sizeName;
    }

    public static function getSizes()
    {
        $clothingSizes = array();
        array_push($clothingSizes, new ClothingSize(1, "XXS"));
        array_push($clothingSizes, new ClothingSize(2, "XS"));
        array_push($clothingSizes, new ClothingSize(3, "S"));
        array_push($clothingSizes, new ClothingSize(4, "M"));
        array_push($clothingSizes, new ClothingSize(5, "L"));
        array_push($clothingSizes, new ClothingSize(5, "XL"));
        array_push($clothingSizes, new ClothingSize(5, "XXL"));

        return $clothingSizes;
    }
}