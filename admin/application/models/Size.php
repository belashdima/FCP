<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
abstract class Size
{
    public $sizeId;
    public $sizeName;

    /**
     * @return mixed
     */
    public function getSizeId()
    {
        return $this->sizeId;
    }

    /**
     * @param mixed $sizeId
     */
    public function setSizeId($sizeId)
    {
        $this->sizeId = $sizeId;
    }

    /**
     * @return mixed
     */
    public function getSizeName()
    {
        return $this->sizeName;
    }

    /**
     * @param mixed $sizeName
     */
    public function setSizeName($sizeName)
    {
        $this->sizeName = $sizeName;
    }

    public abstract static function getSizes();
}