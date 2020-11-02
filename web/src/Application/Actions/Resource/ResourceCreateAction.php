<?php

namespace App\Domain\Resource\Service;

use App\Domain\Resource\Resource;
use App\Domain\Resource\ResourceRepository;

final class ResourceCreateAction
{
    private $repository;

    public function __construct(ResourceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createResource(Resource $data): int
    {
        $userId = $this->repository->insertResource($data);

        $this->logger->info(sprintf('User created successfully: %s', $userId));

        return $userId;
    }
}