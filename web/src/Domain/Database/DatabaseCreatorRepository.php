<?php
declare(strict_types=1);

namespace App\Domain\Database;

use App\Domain\Database\Database;
use PDO;


interface DatabaseCreatorRepository
{
    public function __construct(PDO $connection);

    public function createDatabase();

    public function removeDatabase(string $databaseName);
}
