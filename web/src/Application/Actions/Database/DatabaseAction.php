<?php
declare(strict_types=1);

namespace App\Application\Actions\Database;

use App\Application\Actions\Action;
use App\Domain\Database\DatabaseRepository;
use Psr\Log\LoggerInterface;

abstract class DatabaseAction extends Action
{
    /**
     * @var DatabaseRepository
     */
    protected $databaseRepository;

    /**
     * @param LoggerInterface $logger
     * @param DatabaseRepository  $databaseRepository
     */
    public function __construct(LoggerInterface $logger, DatabaseRepository $databaseRepository)
    {
        parent::__construct($logger);
        $this->databaseRepository = $databaseRepository;
    }
}
