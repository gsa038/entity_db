<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Entity;
use PDO;


interface EntityRepository
{
    public function __construct(PDO $connection);

    /**
     * @param string $entityName
     */
    public function insertEntity(Entity $entity);

    /**
     * @param string $entityName
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function findEntityWithName(string $entityName);

    /**
     * @return Entity[]
     * @throws EntitiesNotFoundException
     */
    public function getAllEntities();
}
