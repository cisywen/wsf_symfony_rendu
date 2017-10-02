<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 27/09/2017
 * Time: 14:07
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity()
 * @ORM\Table(name="comment")
 */
class Comment
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
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(
     * targetEntity="Product",
     * inversedBy="comments")
     *
     * @var Product
     */
    private $product;

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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return text
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }



}