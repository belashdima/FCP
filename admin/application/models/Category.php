<?php

class Category
{
    public $id;
    public $name;
    public $parentCategory;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $parentCategory
     */
    public function __construct($id, $name, $parentCategory)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentCategory = $parentCategory;
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
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * @param mixed $parentCategory
     */
    public function setParentCAtegory($parentCategory)
    {
        $this->parentCategory = $parentCategory;
    }


}