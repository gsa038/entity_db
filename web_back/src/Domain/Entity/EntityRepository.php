<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Entity;
use PDO;

class EntityRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertEntity(Entity $entity)
    {
        $raw = [
            'entityName' => $entity['name']
        ];

        $sql = "INSERT INTO entity SET name=:entityName RETURN id;";

        return $this->connection->prepare($sql)->execute($raw);

        // return (int)$this->connection->lastInsertId();
    }

    public function getEntityIdbyEntityName(string $entityName)
    {
        $raw = [
            'entityName' => $entityName
        ];

        $sql = "SELECT FROM entity where name=:entityName;";

        return $this->connection->prepare($sql)->execute($raw);
    }
}