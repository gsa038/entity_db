<?php

namespace App\Actions\Database;

use App\Infrastructure\Repository\Database\DatabaseCreatorMysqlRepository;

final class DatabaseCreatorAction
{
    private $repository;

    public function __construct(DatabaseCreatorMysqlRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createDatabase(string $databaseName): bool
    {
        if (!$this->isDatabaseExists($databaseName));

        $userId = $this->repository->createDatabase($databaseName);

        $this->logger->info(sprintf('Database created successfully: %s', $databaseName));
    }

    private function isDatabaseExists(string $databaseName): bool
    {

    }
}