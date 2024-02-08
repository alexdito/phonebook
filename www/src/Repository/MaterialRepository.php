<?php

namespace Market\Jeweler\Repository;

use Market\Jeweler\Db\Connection;

class MaterialRepository
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getItemList(): array
    {
        return $this->connection->getConnection()->query("select * from materials")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItemById(int $id): array
    {
        return $this->connection->getConnection()->query("select * from materials where id = {$id}")->fetch(\PDO::FETCH_ASSOC);
    }
}