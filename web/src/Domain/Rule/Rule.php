<?php
declare(strict_types=1);

namespace App\Domain\Tag;

use JsonSerializable;

class Rule extends JsonSerializable
{
    private int $tagId;

    private string $name;

    private string $body;

    private int $priority;

    public function __construct(int $tagId, string $name, string $body, int $priority)
    {
        $this->tagId = $tagId;
        $this->name = $name;
        $this->body = $body;
        $this->priority = $priority;
    }

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'priority' => $this->priority
        ];
    }
}