<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository\Entity;

use App\Domain\Entity\Entity;
use App\Domain\Entity\EntityNotFoundException;
use App\Domain\Entity\EntityRepository;
use PDO;

class EntityCreatorMysqlRepository implements EntityRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $entityName
     */
    public function insertEntity(Entity $entity)
    {
        $raw = [
            'entityName' => $entity['name']
        ];

        $sql = "INSERT INTO entity SET name=:entityName RETURN id;";

        return $this->connection->prepare($sql)->execute($raw);
    }

    /**
     * @param string $entityName
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithName(string $entityName)
    {
        $raw = [
            'entityName' => $entityName
        ];

        $sql = "SELECT FROM entity where name=:entityName;";

        return $this->connection->prepare($sql)->execute($raw);
    }

    public function getAllEntities()
    {
        $sql = "SELECT * FROM entity;";

        return $this->connection->exec($sql);
    }

}