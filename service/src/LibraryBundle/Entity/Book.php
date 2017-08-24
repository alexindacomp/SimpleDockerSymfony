<?php

namespace LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BaseBundle\Abstracts\DatetimeTrait;

/**
 * Book
 *
 * @ORM\Table(name="books_library_book")
 * @ORM\Entity(repositoryClass="LibraryBundle\Repository\BookRepository")
 */
class Book
{
    use DatetimeTrait;

    /**
     * Book ID
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Book title
     *
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="LibraryBundle\Entity\Author")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

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
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param \LibraryBundle\Entity\Author $author
     *
     * @return Book
     */
    public function setAuthor(\LibraryBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \LibraryBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
