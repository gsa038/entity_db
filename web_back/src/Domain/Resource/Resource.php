<?php
declare(strict_types=1);

namespace App\Domain\Resource;

use JsonSerializable;

class Resource
{
    private int $entityId;

    private string $resourceName;

    private string $resourceValue;
    
    private string $resourceValueName;

    public function __construct(int $entityId, string $resourceName, string $resourceValue, string $resourceValueName)
    {
        $this->entityId = $entityId;
        $this->resourceName = strtolower($resourceName);
        $this->resourceValue = strtolower($resourceValue);
        $this->resourceValueName = strtolower($resourceValueName);
    }

    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    public function getResourceValue(): string
    {
        return $this->resourceValue;
    }

    public function getResourceValueName(): string
    {
        return $this->resourceValueName;
    }

    public function jsonSerialize()
    {
        return [
            'entity_id' => $this->entityId,
            'resource_name' => $this->resourceName,
            'value' => $this->resourceValue,
            'value_name' => $this->resourceValueName
        ];
    }
}