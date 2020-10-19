<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use PDO;

class EntityCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->$connection = $connection;
    }

    public function insertEntity(array $entity): int
    {
        $raw = [
            'entityName' => $entity['name']
        ];

        $sql = "INSERT INTO entity SET name=:entityName;";

        $this->connection->prepare($sql)->execution($raw);

        return (int)$this->connection->lastInsertId();
    }
}