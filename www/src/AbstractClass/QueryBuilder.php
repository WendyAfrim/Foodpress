<?php

namespace App\AbstractClass;

interface QueryBuilder {

    public function from(string $table, ?string $alias = null): QueryBuilder;

    public function select(string ...$fields): QueryBuilder;

    public function update(string ...$sets): QueryBuilder;

    public function delete(): QueryBuilder;
 
    public function where(string ...$conditions): QueryBuilder;

    public function having(string ...$conditions): QueryBuilder;
 
    public function limit(int $start, int $offset): QueryBuilder;

    public function orderBy($sort, $order = null): QueryBuilder;

    public function groupBy($column): QueryBuilder;
 
    public function getSQL(): string;
}

?>