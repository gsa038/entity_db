<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Entity;
use PDO;


interface DatabaseCreatorRepository
{
    public function __construct(PDO $connection);

    public function createDatabase();

    public function removeDatabase(string $databaseName);
}
