<?php
declare(strict_types=1);

namespace App\Domain\Tag;

use JsonSerializable;

class Tag
{
    private int $tagId;

    private string $name;

    private string $body;

    private int $priority;

    public function __construct(int $tagId, string $name, string $body)
    {
        $this->tagId = $tagId;
        $this->name = strtolower($name);
        $this->body = strtolower($body);
    }

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function getRuleName(): string
    {
        return $this->name;
    }

    public function getRuleBody(): string
    {
        return $this->body;
    }

    public function getRulePriority(): int
    {
        return $this->priority;
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