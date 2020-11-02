<?php
declare(strict_types=1);

namespace App\Application\Actions\Entity;

use Psr\Http\Message\ResponseInterface as Response;

class ViewEntityByNameAction extends EntityAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $name = $this->request->getAttribute('name');

        if (is_string($name)) {
            $entity = $this->entityRepository->findEntityWithName($name);
            if (!$entity) {
                $statusCode = 500;
                $message =  "Entity with name $name not found";
                $result = json_encode([
                    'statusCode' => $statusCode,
                    'message' => $message
                ]);
            } else {
                $statusCode = 200;
                $message = "Entity with name $name was returned.";
                $result = $this->respondWithData($entity);
            }
            $this->logger->info("Entity with name $name was returned.");
            return $this->respondWithData($result)->withStatus($statusCode);            
        }
        
    }
}
