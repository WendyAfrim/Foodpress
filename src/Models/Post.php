<?php

// Model permettant d'enregistrer toutes les pages et les articles qui seront créees par les utilisateurs.

namespace App\Models;

use App\AbstractClass\AbstractModel;
use DateTime;

class Post extends AbstractModel
{

    protected $table = 'posts';

    protected $id = null;
    protected $title;
    protected $type;
    protected $content;
    protected $enabled;
    protected $created_at;
    protected $updated_at;
    protected $slug;
    protected $author_id;
    protected $media_id;


    /**
     * Appel du constructeur du parent pour instanciation de l'objet PDO
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Récupération de l'id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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
     * Récupération du nom
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Setting du nom
     *
     * @param string 
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }


    /**
     * Récupération du type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Setting du type
     *
     * @param mixed 
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * Récupération de la description
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Setting de la content
     *
     * @param mixed 
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * Récupération du prix
     *
     * @return string
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * Setting du prix
     *
     * @param int 
     */
    public function setEnabled($enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * Récupération des ingrédients
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        
        return $this->created_at;
    }

    /**
     * Setting de la date de la dernière mise à jour
     *
     * @param mixed 
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * Récupération de la date de la dernière mise à jour
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * Setting de l'image
     *
     * @param DateTime
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Récupération du slug
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Setting du slug
     *
     * @param mixed 
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * Récupération de l'auteur
     *
     * @return string
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * Setting de l'auteur
     *
     * @param int 
     */
    public function setAuthorid($author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * Récupération du media
     *
     * @return string
     */
    public function getMediaId(): int
    {
        return $this->media_id;
    }

    /**
     * Setting du media
     *
     * @param int 
     */
    public function setMediaId($media_id): void
    {
        $this->media_id = $media_id;
    }
}
