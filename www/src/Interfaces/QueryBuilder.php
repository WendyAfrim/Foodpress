<?php

namespace App\Interfaces;

use App\Interfaces\QueryBuilder as InterfacesQueryBuilder;

interface QueryBuilder
{

    public function from(string $table, ?string $alias = null): QueryBuilder;

    public function insert(array $fields): QueryBuilder;

    public function select(string ...$fields): QueryBuilder;

    public function update(array $fields): QueryBuilder;

    public function delete(): QueryBuilder;

    public function where(array $conditions): QueryBuilder;

    public function having(string ...$conditions): QueryBuilder;

    public function limit(int $start, int $offset): QueryBuilder;

    public function orderBy($sort, $order = null): QueryBuilder;

    public function groupBy($column): QueryBuilder;

    public function getSQL(): string;
}
