<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class GroundType
{
    private $groundTypeId;
    private $groundTypeName;

    public function __construct($groundTypeId, $groundTypeName)
    {
        $this->groundTypeId = $groundTypeId;
        $this->groundTypeName = $groundTypeName;
    }

    public function getGroundTypeId()
    {
        return $this->groundTypeId;
    }

    public function setGroundTypeId($groundTypeId)
    {
        $this->groundTypeId = $groundTypeId;
    }

    public function getGroundTypeName()
    {
        return $this->groundTypeName;
    }

    public function setGroundTypeName($groundTypeName)
    {
        $this->groundTypeName = $groundTypeName;
    }


}