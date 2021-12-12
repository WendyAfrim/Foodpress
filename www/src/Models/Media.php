<?php

namespace App\Models;

use App\AbstractClass\AbstractModel;

class  Media extends AbstractModel
{
    protected $table = 'media';

    protected $id = null;
    protected $filename;
    protected $title;
    protected $add_at;
    protected $alt; 

    public function __construct()
    {
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

   
    public function getAlt(): string
    {
        return $this->alt;
    }

    public function setAlt($alt): void
    {
        $this->alt = $alt;
    }


    public function getFileName(): string
    {
        return $this->filename;
    }

    public function setFileName($filename): void
    {
        $this->filename = $filename;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = basename($title);
    }

    public function getAdd_At(): date
    {

        return $this->$add_at;
    }

    public function getFile(): string
    {
        return $this->File;
    }

   
    public function setFile($File): void
    {
        $this->file = $File;
    }

    /**
     * Setting de la date
     *
     * @param mixed 
     */
    public function setAdd_At($add_at): void
    {

        $this->add_at = $add_at;
    }

    

   
}

