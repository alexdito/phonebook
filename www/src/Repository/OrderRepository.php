<?php

namespace Market\Jeweler\Repository;

use Market\Jeweler\Db\Connection;

class OrderRepository
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getUserOrders(int $userId): array
    {
        return $this->connection->getConnection()->query("select * from orders where user_id = {$userId}")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createOrder(int $userId, int $sum, string $productName): void
    {
        $this->connection->getConnection()->query(sprintf(
            'insert into orders (user_id, sum, product_name) values (%d, %d, "%s")', $userId, $sum, $productName
        ))->fetch(\PDO::FETCH_ASSOC);
    }
}