<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use JsonSerializable;

class Entity implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $entityName;

    /**
     * @var Resource[]
     */
    private $resources;

    /**
     * @var Tag[]
     */

    /**
     * @param int|null  $id
     * @param string    $entityName
     * @param Resource[]    $resources
     */
    public function __construct(?int $id, string $entityName, ?array $resources)
    {
        $this->id = $id;
        $this->name = $entityName;
        $this->resources = $resources;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @return Resource[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'entity_name' => $this->entityName,
            '$resources' => $this->resources,
        ];
    }
}
