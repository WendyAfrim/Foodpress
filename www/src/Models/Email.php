<?php

namespace App\Models;

use App\AbstractClass\AbstractModel;

class Email extends AbstractModel
{
    protected $table = 'email';

    protected $id = null;
    protected $sender;
    protected $subject;
    protected $content;
    protected $image;
    protected $type;

    /**
     * Setting de l'id
     *
     * @return void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Récupération de l'id
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }


    /**
     * Récupération de l'expéditeur
     *
     * @return void
     */
    public function getSender()
    {

        return $this->sender;
    }

    /**
     * Setting de l'id
     *
     * @return void
     */
    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    /**
     * Get the value of subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
