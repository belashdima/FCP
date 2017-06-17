<?php

class WareType
{
    public $id;
    public $name;
    public $parentType;

    /**
     * WareType constructor.
     * @param $id
     * @param $name
     * @param $parentType
     */
    public function __construct($id, $name, $parentType)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentType = $parentType;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getParentType()
    {
        return $this->parentType;
    }

    /**
     * @param mixed $parentType
     */
    public function setParentType($parentType)
    {
        $this->parentType = $parentType;
    }


}