<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class Brand
{
    private $brandId;
    private $brandName;

    public function __construct($brandId, $brandName)
    {
        $this->brandId = $brandId;
        $this->brandName = $brandName;
    }

    public function getBrandId()
    {
        return $this->brandId;
    }

    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    public function getBrandName()
    {
        return $this->brandName;
    }

    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
    }
}