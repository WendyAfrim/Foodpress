<?php

namespace App\AbstractClass;

use App\Core\Database;
use App\Core\MySQLQueryBuilder;

abstract class AbstractModel
{
    protected $pdo;
    protected $table;
    protected $builder;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
        $this->builder = new MySQLQueryBuilder();
    }

    /**
     * Enregistrement dynamique d'un objet en base de données
     *
     * @return void
     */
    public function save(): void
    {

        $columns = get_object_vars($this);
        $toDelete = get_class_vars(get_class());
        $data = array_diff_key($columns, $toDelete);

        $sql = $this->builder->from($this->table)
            ->insert($data)
            ->getSQL();

        $query_prepared = $this->pdo->prepare($sql);
        $query_prepared->execute($data);
    }

    /**
     * Mis à jour d'un objet existant en base de données
     *
     * @param integer $id
     * @return void
     */
    // public function update(int $id): void
    // {
    //     $columns = get_object_vars($this);
    //     $toDelete = get_class_vars(get_class());
    //     $data = array_diff_key($columns, $toDelete);

    //     $sql = $this->builder->from($this->table)
    //         ->update($data)
    //         ->where(["id" => $id])
    //         ->getSQL();
    // }

    /**
     * Efface un objet d'une table donnée
     *
     * @param integer $id
     * @return void
     */
    public function delete(): void
    {
        $query = $this->builder->from($this->table)
            ->delete()
            ->where(["id = :id"])
            ->getSQL();

        print_r($query);
        die;
        $queryPrepared = $this->pdo->prepare($query);
        $queryPrepared->execute(['id' => $this->id]);
        $response = $queryPrepared->fetch();
    }

    /**
     * Retourne un objet sous forme d'array en fonction de l'id transmis
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): array
    {
        $query = $this->builder->from($this->table)
            ->select("*")
            ->where(["id = :id"])
            ->getSQL();
        $queryPrepared = $this->pdo->prepare($query);
        $queryPrepared->execute(['id' => $id]);
        $object = $queryPrepared->fetch();

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
        $query = $this->builder->from($this->table)
            ->select("*")
            ->getSQL();
        $results = $this->pdo->query($query);
        $object = $results->fetchAll();

        return $object;
    }

    /**
     * Function qui recherche en fonction des propriétés de l'objet
     * Retourne un array
     *
     * @param array $fields
     * @return array
     */
    public function findBy(array $fields): array
    {
        $conditions = [];
        foreach ($fields as $column => $value) {
            $conditions[] = $column . " = " . ":$column";
        }

        $builder = new MySQLQueryBuilder;
        $sql = $builder->from($this->table)
            ->select("*")
            ->where($conditions)
            ->getSQL();

        $query_prepared = $this->pdo->prepare($sql);

        $query_prepared->execute($fields);
        $object = $query_prepared->fetchAll();

        return $object;
    }
}
