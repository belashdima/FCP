<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class Model
{
    private $modelId;
    private $modelName;
    private $modelBrand;
    private $modelPrice;
    private $modelDescription;

    public function __construct($modelId, $modelName, $modelBrand, $modelPrice, $modelDescription)
    {
        $this->modelId = $modelId;
        $this->modelName = $modelName;
        $this->modelBrand = $modelBrand;
        $this->modelPrice = $modelPrice;
        $this->modelDescription = $modelDescription;
    }


}