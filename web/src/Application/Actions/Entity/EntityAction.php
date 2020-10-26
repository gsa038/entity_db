<?php
declare(strict_types=1);

namespace App\Application\Actions\Entity;

use App\Application\Actions\Action;
use App\Domain\Entity\EntityRepository;
use Psr\Log\LoggerInterface;

abstract class EntityAction extends Action
{
    /**
     * @var EntityRepository
     */
    protected $entityRepository;

    /**
     * @param LoggerInterface $logger
     * @param EntityRepository  $entityRepository
     */
    public function __construct(LoggerInterface $logger, EntityRepository $entityRepository)
    {
        parent::__construct($logger);
        $this->entityRepository = $entityRepository;
    }
}
