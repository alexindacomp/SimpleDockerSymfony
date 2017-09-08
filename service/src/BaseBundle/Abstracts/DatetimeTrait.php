<?php

namespace BaseBundle\Abstracts;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DatetimeTrait
 *
 * @package BaseBundle\Abstracts
 */
trait DatetimeTrait
{
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="created")
     */
    private $created;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="updated", nullable=true)
     */
    private $updated;

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     *
     * @return $this
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     *
     * @return $this
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Set updatedAt and createdAt to current if value not specified time on prePersist event
     *
     * @ORM\PrePersist
     */
    public function preCreateChangeDate()
    {
        $this->created = $this->created ?: new \DateTime();
        $this->updated = $this->updated ?: new \DateTime();
    }

    /**
     * Set updatedAt to current time on preUpdate event
     *
     * @ORM\PreUpdate
     */
    public function preUpdateChangeDate()
    {
        $this->updated = new \DateTime();
    }
}
