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

    public function insertResource(Resource $resource)
}