<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class BootsPair
{
    private $bootsId;
    private $bootsSize;
    private $bootsModel;

    private $bootsPrice;// may differ from modelPrice

    public function __construct($bootsId, $bootsSize, $bootsModel, $bootsPrice)
    {
        $this->bootsId = $bootsId;
        $this->bootsSize = $bootsSize;
        $this->bootsModel = $bootsModel;
        $this->bootsPrice = $bootsPrice;
    }
}