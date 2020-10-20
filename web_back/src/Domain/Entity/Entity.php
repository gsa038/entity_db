<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use JsonSerializable;

class Entity
{
    private int $id;

    private string $name;


    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = strtolower($name);
    }

    public function getEntityId(): int
    {
        return $this->id;
    }

    public function getEntityName(): string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}