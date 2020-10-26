<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\DomainException\DomainRecordNotFoundException;

class EntityNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The entity you requested does not exist.';
}
