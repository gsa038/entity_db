<?php
declare(strict_types=1);

namespace App\Application\Actions\Entity;

use Psr\Http\Message\ResponseInterface as Response;

class ViewEntityAction extends EntityAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $entityName = (string) $this->resolveArg('entityName');
        $entity = $this->entityRepository->findEntityWithName($entityName);

        $this->logger->info("Entity id with name `${entityName}` was returned.");

        return $this->respondWithData($entity);
    }
}
