<?php

namespace Market\Jeweler\Repository;

use Exception;
use Market\Jeweler\Db\Connection;

class UserRepository
{
    protected Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function createUser(string $fio, string $phone)
    {
        $this->connection->getConnection()->query(
            sprintf('insert into users (fio, phone) values ("%s", "%s")', $fio, $phone)
        );
    }

    public function getUser(string $fio, string $phone)
    {
        return $this->connection->getConnection()->query(
            sprintf(
                'select * from users where fio = "%s" and phone = "%s"',
                $fio,
                $phone,
            )
        )->fetch(\PDO::FETCH_ASSOC);
    }
}