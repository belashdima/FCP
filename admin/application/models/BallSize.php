<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class BallSize extends Size
{
    public function __construct($sizeId, $sizeName)
    {
        $this->sizeId = $sizeId;
        $this->sizeName = $sizeName;
    }

    public static function getSizes()
    {
        $ballSizes = array();
        array_push($ballSizes, new BallSize(1, "1"));
        array_push($ballSizes, new BallSize(2, "2"));
        array_push($ballSizes, new BallSize(3, "3"));
        array_push($ballSizes, new BallSize(4, "4"));
        array_push($ballSizes, new BallSize(5, "5"));

        return $ballSizes;
    }
}