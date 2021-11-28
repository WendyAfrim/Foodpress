<?php

namespace App\Models;

use App\AbstractClass\AbstractModel;

class Menu extends AbstractModel
{

    protected $table = 'nav_menu';

    protected $id = null;
    protected $label;
    protected $post_id;

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
     * Récupération du label
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Setting du label
     *
     * @param string 
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * Récupération du post_id
     *
     * @return string
     */
    public function getPostId(): string
    {
        return $this->post_id;
    }

    /**
     * Setting du post_id
     *
     * @param mixed 
     */
    public function setPostId($post_id): void
    {
        $this->post_id = $post_id;
    }
}
