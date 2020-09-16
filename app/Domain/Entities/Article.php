<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\ACL\Mappings as ACL;

/**
 * @ORM\Entity()
 */
class Article
{

    use Timestamps;

    /** 
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     * */
    private $id;

    /** @ORM\Column(type="string") */
    private $title;

    /** @ORM\Column(type="string") */
    private $teste;

    /**
     * @ORM\OneToMany(targetEntity="ArticleAttribute", mappedBy="article", cascade={"ALL"}, indexBy="attribute")
     */
    private $attributes;

    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = new ArticleAttribute($name, $value, $this);
    }
}

/**
 * @ORM\Entity
 */
class ArticleAttribute
{
    /** @ORM\Id 
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="attributes") */
    private $article;

    /** @ORM\Id 
     * @ORM\Column(type="string") */
    private $attribute;

    /** @ORM\Column(type="string") */
    private $value;

    public function __construct($name, $value, $article)
    {
        $this->attribute = $name;
        $this->value = $value;
        $this->article = $article;
    }
}
