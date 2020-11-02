<?php
declare(strict_types=1);

namespace App\Application\Actions\Entity;

use Psr\Http\Message\ResponseInterface as Response;

class ViewEntityByIdAction extends EntityAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = $this->request->getAttribute('id');
        if (is_int($id)) {

        }
        $entity = $this->entityRepository->findEntityWithId($id);

        $this->logger->info("Entity with id $id was returned.");

        return $this->respondWithData($entity);
    }
}
