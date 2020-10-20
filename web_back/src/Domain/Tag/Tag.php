<?php
declare(strict_types=1);

namespace App\Domain\Tag;

use JsonSerializable;

class Tag
{
    private int $id;

    private string $name;

    private string $value;

    public function __construct(?int $id, string $name, string $value)
    {
        $this->id = $id;
        $this->name = strtolower($name);
        $this->value = strtolower($value);
    }

    public function getTagId(): int
    {
        return $this->id;
    }

    public function getTagName(): string
    {
        return $this->name;
    }

    public function getTagValue(): string
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}