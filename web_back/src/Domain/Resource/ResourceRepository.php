<?php
declare(strict_types=1);

namespace App\Domain\Resource;

use PDO;

class ResourceRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertResource(array $resource): int
    {
        $raw = [
            'entity_id' => $resource['entity_id'],
            'name' => $resource['name'],
            'value' => $resource['value'],
            'value_name' => $resource['value_name'],
        ];

        $sql = "INSERT INTO entity_resource SET 
                entity_id=:entity_id,
                name=:name,
                value=:value,
                value_name=:value_name;";

        $this->connection->prepare($sql)->execute($raw);

        return (int)$this->connection->lastInsertId();
    }
}