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

    public function createUser(string $firstName, string $lastName, string $secondName)
    {
        $this->connection->getConnection()->query(
            sprintf('insert into users (first_name, last_name, second_name) values ("%s", "%s", "%s")', $firstName, $lastName, $secondName)
        );
    }

    public function getUser(string $firstName, string $lastName, string $secondName)
    {
        return $this->connection->getConnection()->query(
            sprintf(
                'select * from users where first_name = "%s" and last_name = "%s" and second_name = "%s"',
                $firstName,
                $lastName,
                $secondName
            )
        )->fetch(\PDO::FETCH_ASSOC);
    }
}