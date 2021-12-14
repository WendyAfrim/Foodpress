<?php

// Model permettant d'enregistrer toutes les pages et les articles qui seront créees par les utilisateurs.

namespace App\Models;

use App\AbstractClass\AbstractModel;

class Order extends AbstractModel
{

    protected $table = 'orders';

    protected $id = null;
    protected $quantity;
    protected $product_id;
    protected $user_id;
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
     * Récupération de la quantité
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Setting de la quantité
     *
     * @return void
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Récupération du nom
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * Setting du nom
     *
     * @return void
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * Récupération de l'id du post associé
     *
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * Setting de l'id du post associé
     *
     * @return void
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
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
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
