<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Resource\Resource;
use App\Domain\Tag\Tag;
use JsonSerializable;

class Entity implements JsonSerializable
{
    /**
     * @var int|null
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var Resource[]
     */
    private array $resources;

    /**
     * @var Tag[]
     */
    private array $tags;

    /**
     * @param int|null      $id
     * @param string        $name
     * @param Resource[]    $resources
     * @param Tag[]    $tags
     */
    public function __construct(?int $id, string $name, ?array $resources = [], ?array $tags = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->resources = $resources;
        $this->tags = $tags;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Resource[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
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
            '$tags' => $this->tags,
        ];
    }
}
