<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\DomainException\DomainRecordNotFoundException;

class EntitiesNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'There\'re no entities';
}
