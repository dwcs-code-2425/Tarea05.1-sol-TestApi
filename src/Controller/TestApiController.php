<?php

namespace App\Controller;

use App\Service\TodoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestApiController extends AbstractController
{
    #[Route('/test/api/{id}', name: 'app_test_api_id')]
    public function index(int $id, TodoService $todoService): Response
    {
        $todoDTO = $todoService->findById($id); 

        if($todoDTO){
            $this->addFlash("success", "Se ha recuperado el Todo con éxito");
        }
        else{
              $this->addFlash("danger", "No se ha podido recuperar el Todo con éxito");
        }
        return $this->render('test_api/index.html.twig', [
            'controller_name' => 'TestApiController',
            "todoDTO" => $todoDTO
        ]);
    }
}
