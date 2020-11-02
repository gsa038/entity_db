<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository\Entity;

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
     * @param string $name
     */
    public function insertEntity(string $name)
    {
        $sql = "INSERT INTO entity SET %S RETURN id;";
        $result = $this->connection->query($sql, $name);
        
        return $result;
    }

    /**
     * @param string $name
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithName(string $name)
    {
        $raw = [
            'name' => $name
        ];

        $sql = "SELECT FROM entity where name=:name;";

        $prepared = $this->connection->prepare($sql);
        $prepared->execute($raw);
        
        if ($prepared->fetchColumn() === 1) {
            $result = True;
        } else {
            $result = False;
        }
        return $result;
    }

    /**
     * @param int $id
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithId(string $id)
    {
        $raw = [
            'id' => $id
        ];

        $sql = "SELECT FROM entity where id=:id;";

        $prepared = $this->connection->prepare($sql);
        $prepared->execute($raw);
        
        if ($prepared->fetchColumn() === 1) {
            $result = True;
        } else {
            $result = False;
        }
        return $result;
    }

    public function getAllEntities()
    {
        $sql = "SELECT * FROM entity;";

        return $this->connection->exec($sql);
    }

}