<?php
declare(strict_types=1);

namespace App\Controller\Database;

use PDO;

class DBCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function createDatabase()
    {
        $createDBTransactionString = "CREATE TABLE `entity` (
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

          
    }
}