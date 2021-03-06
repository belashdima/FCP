<?php

class Category
{
    public $id;
    public $name;
    public $parentCategory;
    public $urlPresentation;
    public $shown;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $parentCategory
     * @param $urlPresentation
     */
    public function __construct($id, $name, $parentCategory, $urlPresentation, $shown)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentCategory = $parentCategory;
        $this->urlPresentation = $urlPresentation;
        $this->shown = $shown;
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

    /**
     * @return mixed
     */
    public function getUrlPresentation()
    {
        return $this->urlPresentation;
    }

    /**
     * @param mixed $urlPresentation
     */
    public function setUrlPresentation($urlPresentation)
    {
        $this->urlPresentation = $urlPresentation;
    }

    /**
     * @return mixed
     */
    public function getShown()
    {
        return $this->shown;
    }

    /**
     * @param mixed $shown
     */
    public function setShown($shown)
    {
        $this->shown = $shown;
    }
}