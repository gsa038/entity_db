<?php
declare(strict_types=1);

namespace App\Domain\Resource;

use JsonSerializable;

class Resource implements JsonSerializable
{
    /**
     * @var int
     */
    private int $entityId;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $value;

    /**
     * @var string
     */
    private string $valueName;

    /**
     * @param int       $entityId
     * @param string    $name
     * @param int       $value
     * @param string    $valueName
     */
    public function __construct(int $entityId, string $name, int $value, string $valueName)
    {
        $this->entityId = $entityId;
        $this->name = strtolower($name);
        $this->value = strtolower($value);
        $this->valueName = strtolower($valueName);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getValueName(): string
    {
        return $this->valueName;
    }

    public function jsonSerialize()
    {
        return [
            'entity_id' => $this->entityId,
            'name' => $this->name,
            'value' => $this->value,
            'value_name' => $this->valueName
        ];
    }
}