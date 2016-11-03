<?php

namespace Login\LoginBundle\Entity;

/**
 * Category
 */
class Category
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $categoryid;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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

    /**
     * Get categoryid
     *
     * @return integer
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }
}

