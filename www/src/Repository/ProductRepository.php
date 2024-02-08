<?php

namespace Market\Jeweler\Repository;

use Market\Jeweler\Db\Connection;

class ProductRepository
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getItemList(): array
    {
        return $this->connection->getConnection()->query("select * from products")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItemById(int $id): array
    {
        return $this->connection->getConnection()->query("select * from products where id = {$id}")->fetch(\PDO::FETCH_ASSOC);
    }
}