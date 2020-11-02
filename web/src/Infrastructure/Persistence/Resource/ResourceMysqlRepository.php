<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Resource;

use App\Domain\Resource\Resource;
use App\Domain\Resource\ResourceRepository;
use PDO;

class ResourceMysqlRepository implements ResourceRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertResource(Resource $resource): int
    {
        $raw = [
            'entity_id' => $resource['entityId'],
            'name' => $resource['name'],
            'value' => $resource['value'],
            'value_name' => $resource['valueName'],
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