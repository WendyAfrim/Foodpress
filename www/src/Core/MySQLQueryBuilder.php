<?php

namespace App\Core;

use App\Interfaces\QueryBuilder;

class MySQLQueryBuilder implements QueryBuilder
{

    protected $query;

    protected function reset(): void
    {
        $this->query = new \stdClass;
    }

    public function from(string $table, ?string $alias = null): QueryBuilder
    {
        $this->reset();
        if ($alias === null) {
            $this->query->from[] = $table;
        } else {
            $this->query->from[] = "${table} AS ${alias}";
        }
        return $this;
    }

    public function select(...$fields): QueryBuilder
    {
        $this->query->operation = "SELECT " . implode(",", $fields) . " FROM " . implode(",", $this->query->from);
        $this->query->type = 'select';
        return $this;
    }

    public function insert(array $fields): QueryBuilder
    {
        $this->query->operation = "INSERT INTO " . implode(",", $this->query->from) . "(" . implode(",", $fields) . ") VALUES (:" . implode(",:", $fields) . ")";
        $this->query->type = 'insert';
        return $this;
    }

    public function delete(): QueryBuilder
    {
        $this->query->operation = "DELETE FROM " . implode(",", $this->query->from);
        $this->query->type = 'delete';
        return $this;
    }

    public function update(string ...$sets): QueryBuilder
    {
        $this->query->operation = "UPDATE " . implode(",", $this->query->from) . " SET " . implode(",", $sets);
        $this->query->type = 'update';
        return $this;
    }

    public function where(array $conditions): QueryBuilder
    {
        foreach ($conditions as $condition) {
            $this->query->where[] = $condition;
        }
        return $this;
    }

    public function having(string ...$conditions): QueryBuilder
    {
        foreach ($conditions as $condition) {
            $this->query->having[] = $condition;
        }
        return $this;
    }

    public function limit(int $start, int $offset): QueryBuilder
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new \Exception("LIMIT ne peut être ajouté qu'à une commande SELECT");
        }
        $this->query->limit = " LIMIT $start, $offset";
        return $this;
    }

    public function orderBy($column, $order = null): QueryBuilder
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new \Exception("ORDER BY ne peut être ajouté qu'à une commande SELECT");
        }
        $this->query->orderBy = " ORDER BY $column";
        if ($order === 'DESC')  $this->query->orderBy .= " $order";
        return $this;
    }

    public function groupBy($column): QueryBuilder
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new \Exception("GROUP BY ne peut être ajouté qu'à une commande SELECT");
        }
        $this->query->groupBy = " GROUP BY $column";
        return $this;
    }


    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->operation;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (!empty($query->having)) {
            $sql .= " HAVING " . implode(' AND ', $query->having);
        }
        if (isset($query->groupBy)) {
            $sql .= $query->groupBy;
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        if (isset($query->orderBy)) {
            $sql .= $query->orderBy;
        }
        $sql .= ";";
        return $sql;
    }
}
