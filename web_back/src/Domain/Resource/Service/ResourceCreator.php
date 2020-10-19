<?php

namespace App\Domain\Resource\Service;

use App\Domain\Resource\ResourceCreatorRepository;
use App\Exception\ValidationException;

final class ResourceCreator
{
    private $repository;

    public function __construct(ResourceCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createResource(array $data): int
    {
        $this->validateNewEntity($data);

        $userId = $this->repository->insertResource($data);

        $this->logger->info(sprintf('User created successfully: %s', $userId));

        return $userId;
    }

    private function validateNewEntity(array $data): void
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['entityName'] = 'Input required';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}