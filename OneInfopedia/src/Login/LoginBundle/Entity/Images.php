<?php

namespace Login\LoginBundle\Entity;

/**
 * Images
 */
class Images
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $image;

    /**
     * @var integer
     */
    private $imageid;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Images
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Images
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get imageid
     *
     * @return integer
     */
    public function getImageid()
    {
        return $this->imageid;
    }
}

