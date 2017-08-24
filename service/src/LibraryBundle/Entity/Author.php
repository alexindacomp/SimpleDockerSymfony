<?php

namespace LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BaseBundle\Abstracts\DatetimeTrait;

/**
 * Author
 *
 * @ORM\Table(name="books_library_author")
 * @ORM\Entity(repositoryClass="LibraryBundle\Repository\AuthorRepository")
 */
class Author
{
    use DatetimeTrait;

    /**
     * Author ID
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Author name
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
