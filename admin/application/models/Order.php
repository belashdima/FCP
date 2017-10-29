<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
class Order
{
    public $id;
    public $fio;
    public $email;
    public $phoneNumber;
    public $additionalInfo;
    public $orderItems;

    /**
     * Order constructor.
     * @param $id
     * @param $fio
     * @param $email
     * @param $phoneNumber
     * @param $additionalInfo
     * @param $orderItems
     */
    public function __construct($id, $fio, $email, $phoneNumber, $additionalInfo, $orderItems)
    {
        $this->id = $id;
        $this->fio = $fio;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->additionalInfo = $additionalInfo;
        $this->orderItems = $orderItems;
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
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @param mixed $fio
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return mixed
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param mixed $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }
}