<?php
namespace App\Service;

use DateTimeImmutable;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use TodoDTO;
class TodoService
{
    const URL = "http://127.0.0.1:8000/api/todos";

    public function __construct(
        private HttpClientInterface $client, private  LoggerInterface $logger
    ) {
    }

    public function findById(int $id)
    {
        
        $todoDTO = null;

        try {
            $response = $this->client->request('GET', self::URL . "/$id");

            if ($response->getStatusCode() == 200) {
                $content = $response->getContent();
                if (!empty($content)) {
                    $content = $response->toArray(); // se transforma a un array asociativo
                    $todoDTO = new TodoDTO();
                    $todoDTO->setTitle($content["title"]);
                    $todoDTO->setCompleted($content["completed"]);
                    $todoDTO->setCreatedAt(new DateTimeImmutable($content["createdAt"]));
                    $todoDTO->setUpdatedAt(new DateTimeImmutable($content["updatedAt"]));
                    $todoDTO->setId($content["id"]);
                }
            }
        }
        catch(Exception $ex)
{
            $this->logger->error('An error occurred invoking " . self::URL . "/$id' + $ex->getMessage()); 
}

        return $todoDTO;

    }

}