<?php

declare(strict_types=1);

namespace App\Domain\Database;

use App\Domain\DomainException\DomainDatabaseNotFoundException;

class DatabaseNotFoundException extends DomainDatabaseNotFoundException
{
    public $message = 'The database you\'ve requested isn\'t exist';
}