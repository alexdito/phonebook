<?php

namespace Market\Jeweler\Db;

use PDO;
use PDOException;

class Connection
{
    protected $connection;
    public function __construct()
    {
        $host = 'database';
        $dbname = 'phonebook';
        $username = 'phonebook';
        $password = 'phonebook';

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}