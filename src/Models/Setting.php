<?php

// Model permettant d'enregistrer toutes les pages et les articles qui seront créees par les utilisateurs.

namespace App\Models;

use App\AbstractClass\AbstractModel;

class Setting extends AbstractModel
{

    protected $table = 'settings';

    protected $id = null;
    protected $name;
    protected $value;

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
     * @return int
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Setting du nom
     *
     * @return void
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Récupération de l'id du post associé
     *
     * @return int
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Setting de l'id du post associé
     *
     * @return void
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
