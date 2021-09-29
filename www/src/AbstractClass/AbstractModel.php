<?php

namespace App\AbstractClass;

use App\Core\Database;

abstract class AbstractModel
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Retourne un objet sous forme d'array en fonction de l'id transmis
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);

        $object = $query->fetch();

        return $object;
    }

    /**
     *  Retourne tous les objets d'une table donnée 
     *
     * @param string|null $order
     * @return void
     */
    public function findAll(?string $order = "")
    {

        $sql = "SELECT * FROM {$this->table}";

        if ($order) {

            $sql .= " ORDER BY " . $order;
        }

        $results = $this->pdo->query($sql);
        $object = $results->fetchAll();

        return $object;
    }

    // public function findBy(array $fields): array
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE (" . implode(",", array_keys($fields)) . ")");

    // }

    /**
     * Met à jour un objet d'une table
     *
     * @param integer $id
     * @return void
     */
    // public function update(int $id, array $fields): void
    // {
    //     $query = $this->pdo->prepare("UPDATE {$this->table} SET WHERE id = :id");
    //     $query->execute(['id' => $id]);
    // }


    /**
     * Efface un objet d'une table donnée
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}
