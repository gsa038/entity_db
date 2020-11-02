<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Entity;
use PDO;


interface EntityRepository
{
    public function __construct(PDO $connection);

    /**
     * @param string $name
     */
    public function insertEntity(string $name);

    /**
     * @param string $name
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithName(string $name): Entity;

    /**
     * @param int $id
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithId(string $id): Entity;

    /**
     * @return Entity[]
     * @throws EntitiesNotFoundException
     */
    public function getAllEntities();
}
