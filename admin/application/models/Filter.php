<?php


class Filter
{
    public $property;
    public $possibleValues;

    /**
     * Filter constructor.
     * @param $property
     * @param $possibleValues
     */
    public function __construct($property, $possibleValues)
    {
        $this->property = $property;
        $this->possibleValues = $possibleValues;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getPossibleValues()
    {
        return $this->possibleValues;
    }

    /**
     * @param mixed $possibleValues
     */
    public function setPossibleValues($possibleValues)
    {
        $this->possibleValues = $possibleValues;
    }



}