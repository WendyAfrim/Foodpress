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

    protected function getData()
    {
        $columns = get_object_vars($this);
        $toDelete = get_class_vars(get_class());
        return array_diff_key($columns, $toDelete);
    }

    /**
     * Enregistrement dynamique d'un objet en base de données
     *
     * @return void
     */
    public function save(): void
    {
        // On récupère les colonnes => valeurs à modifier
        $data = $this->getData();

        
        // On construit la requête en fonction de l'id de l'instance
        $sql = $this->builder->from($this->table);

        if (isset($this->id)) {
            $sql->update($data)
            ->where(["id = :id"]);
        } else {
            $sql->insert($data);
        }
        $sql = $sql->getSQL();

        // On execute la requête préparée
        $query_prepared = $this->pdo->prepare($sql);
        $query_prepared->execute($data);
    }

    /**
     * Efface un objet d'une table donnée
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): bool
    {
        $query = $this->builder->from($this->table)
            ->delete()
            ->where(["id = :id"])
            ->getSQL();
        $queryPrepared = $this->pdo->prepare($query);
        $queryPrepared->execute(['id' => $id]);
        return $queryPrepared->rowCount() == 1;
    }

    /**
     * Retourne un objet sous forme d'instance de la classe en fonction de l'id transmis
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): AbstractModel
    {
        // On construit la requête
        $query = $this->builder->from($this->table)
            ->select("*")
            ->where(["id = :id"])
            ->getSQL();

        //
        $queryPrepared = $this->pdo->prepare($query);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
        $queryPrepared->execute(['id' => $id]);
        $object = $queryPrepared->fetch();

        return $object;
    }

    /**
     *  Retourne tous les objets d'une table donnée
     *
     * @param string|null $order
     * @return array
     */
    public function findAll(?string $order = ""): array
    {
        // On construit la requête
        $query = $this->builder->from($this->table)
            ->select("*")
            ->getSQL();

        // On exécute la requête
        $results = $this->pdo->query($query);
        $objects = $results->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $objects;
    }

    /**
     * Function qui recherche en fonction des propriétés de l'objet
     * Retourne un array d'objets
     *
     * @param array $fields
     * @return array
     */
    public function findBy(array $fields): array
    {
        //On formate les critères reçus pour le querybuilder
        foreach ($fields as $column => $value) {
            $conditions[] = "$column = :$column";
        }
        // On construit la requête
        $sql = $this->builder->from($this->table)
            ->select("*")
            ->where($conditions)
            ->getSQL();

        // On exécute la requête
        $query_prepared = $this->pdo->prepare($sql);
        $query_prepared->execute($fields);
        $objects = $query_prepared->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $objects;
    }

    public function findByOne(array $fields): ?AbstractModel
    {
        //On formate les critères reçus pour le querybuilder
        foreach ($fields as $column => $value) {
            $conditions[] = "$column = :$column";
        }
        // On construit la requête
        $sql = $this->builder->from($this->table)
            ->select("*")
            ->where($conditions)
            ->getSQL();

        // On exécute la requête
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
        $queryPrepared->execute($fields);
        $object = $queryPrepared->fetch();
        return $object ? $object : null;
    }
}
