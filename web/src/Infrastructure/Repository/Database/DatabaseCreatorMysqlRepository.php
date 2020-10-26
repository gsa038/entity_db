<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository\Database;

use App\Domain\Entity\DatabaseCreatorRepository;
use PDO;

class DatabaseCreatorMysqlRepository implements DatabaseCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function createDatabase()
    {
        $sql = "CREATE TABLE `entity` (
            `id` int AUTO_INCREMENT,
            `name` varchar(255) PRIMARY KEY
          );
          
          CREATE TABLE `entity_resource` (
            `entity_id` int,
            `resource_name` varchar(255),
            `value` int,
            `value_name` varchar(255)
          );
          
          CREATE TABLE `entity2tag` (
            `entity_id` int,
            `tag_id` int
          );
          
          CREATE TABLE `tag` (
            `id` int AUTO_INCREMENT,
            `name` varchar(255) PRIMARY KEY,
            `value` varchar(255)
          );
          
          CREATE TABLE `tag_rule` (
            `tag_id` int,
            `name` varchar(255) PRIMARY KEY,
            `body` varchar(255),
            `priotity` int
          );
          
          ALTER TABLE `entity_resource` ADD FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`);
          
          ALTER TABLE `entity2tag` ADD FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`);
          
          ALTER TABLE `entity2tag` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);
          
          ALTER TABLE `tag_rule` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);";

        $this->connection->exec($sql);
    }

    public function removeDatabase(string $databaseName)
    {
      $raw = [
        'databaseName' => $databaseName
      ];
      $sql = "DROP database $databaseName;";

      $this->connection->prepare($raw)->execute($sql);
    }
}