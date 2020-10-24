<?php


namespace App\Pack\Domain;


use DateTime;

abstract class BaseEntity
{
    /**
     * @var DateTime
     */
    protected $creatAt;

    /**
     * @var DateTime
     */
    protected $updateAt;

    /**
     * @return DateTime
     */
    public function getCreatAt(): DateTime
    {
        return $this->creatAt;
    }

    /**
     * BaseEntity constructor.
     */
    public function __construct()
    {
        $now = new DateTime(date('Y-m-d H:i:s'));
        $this->setCreatAt( $now);
        $this->setUpdateAt($now);
    }
    /**
     * @param DateTime $creatAt
     */
    public function setCreatAt(DateTime $creatAt): void
    {
        $this->creatAt = $creatAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdateAt(): DateTime
    {
        return $this->updateAt;
    }

    /**
     * @param DateTime $updateAt
     */
    public function setUpdateAt(DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

}