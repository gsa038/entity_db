<?php

namespace App\Application\Actions\Entity;

use Psr\Http\Message\ResponseInterface as Response;

class EntityCreateAction extends EntityAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $name = json_decode($this->request->getBody())['entity']['name'];
        $id = $this->entityRepository->insertEntity($name);
        if (!$id) {
            $message = "User $name was not created.";
            $statusCode = 500;
        }
        else {
            $message = "User $name was created with id $id.";
            $statusCode = 200;
        }
        $this->logger->info($message);
        $response = [
            'statusCode' => $statusCode,
            'message' => $message
        ];

        return $this->respondWithData($response);
    }
}