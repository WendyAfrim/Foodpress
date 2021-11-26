<?php

namespace App\Models;

use App\AbstractClass\AbstractModel;

class Product extends AbstractModel
{

    protected $table = 'product';

    protected $id = null;
    protected $name;
    protected $type;
    protected $description;
    protected $price;
    protected $ingredients;
    protected $image;
    protected $created_at;
    protected $updated_at;


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
    public function getId()
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Setting du nom
     *
     * @param mixed 
     */
    public function setName($name): void
    {
        $this->name = $name;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Setting de la description
     *
     * @param mixed 
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * Récupération du prix
     *
     * @return string
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Setting du prix
     *
     * @param mixed 
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * Récupération de la liste d'ingrédients
     *
     * @return string
     */
    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    /**
     * Setting de la liste d'ingrédients
     *
     * @param mixed 
     */
    public function setIngredients($ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * Récupération de l'image
     *
     * @return string
     */
    public function getImage(): string
    {

        return $this->image;
    }

    /**
     * Setting de l'image
     *
     * @param mixed 
     */
    public function setImage($image): void
    {

        $this->image = $image;
    }

    /**
     * Récupération de la date d'enregistrement
     *
     * @return string
     */
    public function getCreatedAt(): string
    {

        return $this->created_at;
    }

    /**
     * Setting de la date d'enregistrement
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
     * Setting de la date de la dernière mise à jour
     *
     * @param DateTime
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
