<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class PopularCategory
{
    public $id;
    public $name;
    public $urlPresentation;
    public $image;

    /**
     * PopularCategory constructor.
     * @param $id
     * @param $name
     * @param $urlPresentation
     * @param $image
     */
    public function __construct($id, $name, $urlPresentation, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->urlPresentation = $urlPresentation;
        $this->image = $image;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}