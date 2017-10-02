<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 19/09/2017
 * Time: 10:49
 */
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\Table(name="product")
 */


class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @var text
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @Assert\NotBlank()
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @Assert\NotBlank()
     * @Assert\Image()
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $image;
    /**
     * @ORM\ManyToOne(
     * targetEntity="Category",
     * inversedBy="products")
     *
     * @var Category
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Comment",
    mappedBy="product")
     *
     * @var Collection<Comment>
     */
    private $comments;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return text
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function __toString()
    {
        return $this->name;

    }
}