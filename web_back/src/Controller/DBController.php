<?php

declare(strict_types=1);

namespace APP\Controller;

use Psr\Log\LoggerInterface;
use mysqli;
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Util\Json;

require __DIR__ . '/DBQueries.php';

class DBController
{   
    private $connectionHandler;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $connectrionHandler = $this->connectionHandler;
    }

    public function dbInit()
    {
        $connectionHandler = $this->connect();
        mysqli_query($connectionHandler, DB_CREATE_QUERY);

        mysqli_query($connectionHandler, DB_DEMO_DATA_FILL_QUERY);

    }

    private function connect()
    {
        $connectionHandler = mysqli_connect(MYSQL_HOST, MYSQL_ROOT_USER, MYSQL_ROOT_PASSWORD, MYSQL_DATABASE);
        if (mysqli_connect_error()){
            $this->logger->error("Error: Cannot connect to MySQL " . mysqli_connect_error());
            return null;
        }
        else {
            $this->logger->info("Connection successfully established");
            return $connectionHandler;
        }
    }

    public function getItem(string $item) {
        $connectionHandler = $this->connect();
        return mysqli_query($connectionHandler, [GET_ITEM_QUERY,$item]);
    }

    public function isItemExists(string $item): bool 
    {
        if ($this->getItem($item) !== null) {
            return True;
        }
        else {
            return False;
        }
    }

    public function addItem(string $item): bool
    {
        $connectionHandler = $this->connect();
        if ($this->isItemExists($item)) {
            return false;
        }
        

    }
}