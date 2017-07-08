<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class ShoeSize
{
    private $sizeID;
    private $sizeEu;
    private $sizeUk;
    private $sizeUs;

    public function __construct($sizeID, $sizeEu, $sizeUk, $sizeUs)
    {
        $this->sizeID = $sizeID;
        $this->sizeEu = $sizeEu;
        $this->sizeUk = $sizeUk;
        $this->sizeUs = $sizeUs;
    }

    public function getSizeId()
    {
        return $this->sizeID;
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
}