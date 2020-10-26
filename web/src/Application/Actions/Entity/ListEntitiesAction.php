<?php
declare(strict_types=1);

namespace App\Application\Actions\Entity;

use Psr\Http\Message\ResponseInterface as Response;

class ListEntitiesAction extends EntityAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $entities = $this->entityRepository->getAllEntities();

        $this->logger->info("Entities list was returned.");

        return $this->respondWithData($entities);
    }
}
