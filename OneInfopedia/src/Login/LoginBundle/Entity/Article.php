<?php

namespace Login\LoginBundle\Entity;

/**
 * Article
 */
class Article
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $publisheddate;

    /**
     * @var \DateTime
     */
    private $updateddate;

    /**
     * @var integer
     */
    private $imageid;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $articleid;

    /**
     * @var string
     */
    private $tag;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
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
     * Set body
     *
     * @param string $body
     *
     * @return Article
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set publisheddate
     *
     * @param \DateTime $publisheddate
     *
     * @return Article
     */
    public function setPublisheddate($publisheddate)
    {
        $this->publisheddate = $publisheddate;

        return $this;
    }

    /**
     * Get publisheddate
     *
     * @return \DateTime
     */
    public function getPublisheddate()
    {
        return $this->publisheddate;
    }

    /**
     * Set updateddate
     *
     * @param \DateTime $updateddate
     *
     * @return Article
     */
    public function setUpdateddate($updateddate)
    {
        $this->updateddate = $updateddate;

        return $this;
    }

    /**
     * Get updateddate
     *
     * @return \DateTime
     */
    public function getUpdateddate()
    {
        return $this->updateddate;
    }

    /**
     * Set imageid
     *
     * @param integer $imageid
     *
     * @return Article
     */
    public function setImageid($imageid)
    {
        $this->imageid = $imageid;

        return $this;
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Article
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    // /**
    //  * Set articleid
    //  *
    //  * @param integer $articleid
    //  *
    //  * @return Article
    //  */
    // public function setArticleid($articleid)
    // {
    //     $this->articleid = $articleid;

    //     return $this;
    // }

    /**
     * Get articleid
     *
     * @return integer
     */
    public function getArticleid()
    {
        return $this->articleid;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Article
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
}

