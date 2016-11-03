<?php

namespace Login\LoginBundle\Entity;

/**
 * Keypoint
 */
class Keypoint
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $emailcontributor;

    /**
     * @var integer
     */
    private $articleid;

    /**
     * @var integer
     */
    private $keypointid;


// ******************************************************************************************************


    /**
     * @var string
     */
    private $authoremail;

    /**
     * @var string
     */
    private $title;

    /**
     * Set authoremail
     *
     * @param string $authoremail
     *
     * @return Keypoint
     */
    public function setAuthoremail($authoremail)
    {
        $this->authoremail = $authoremail;
        return $this;
    }

    /**
     * Get authoremail
     *
     * @return string
     */
    public function getAuthoremail()
    {
        return $this->authoremail;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Keypoint
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


// ******************************************************************************************************










    /**
     * Set body
     *
     * @param string $body
     *
     * @return Keypoint
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
     * Set emailcontributor
     *
     * @param string $emailcontributor
     *
     * @return Keypoint
     */
    public function setEmailcontributor($emailcontributor)
    {
        $this->emailcontributor = $emailcontributor;

        return $this;
    }

    /**
     * Get emailcontributor
     *
     * @return string
     */
    public function getEmailcontributor()
    {
        return $this->emailcontributor;
    }

    /**
     * Set articleid
     *
     * @param integer $articleid
     *
     * @return Keypoint
     */
    public function setArticleid($articleid)
    {
        $this->articleid = $articleid;

        return $this;
    }

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
     * Get keypointid
     *
     * @return integer
     */
    public function getKeypointid()
    {
        return $this->keypointid;
    }
}

