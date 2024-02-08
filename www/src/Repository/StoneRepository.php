<?php

namespace Market\Jeweler\Repository;

use Market\Jeweler\Db\Connection;

class StoneRepository
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getItemList(): array
    {
        return $this->connection->getConnection()->query("select * from stones")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItemById(int $id): array
    {
        return $this->connection->getConnection()->query("select * from stones where id = {$id}")->fetch(\PDO::FETCH_ASSOC);
    }
}