<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    #[Route('/liste-regions', name: 'listRegion')]
    public function index(SerializerInterface $serializer): Response
    {
        $mesRegions = file_get_contents('https://geo.api.gouv.fr/regions');
        $mesRegionsArray = $serializer->decode($mesRegions, 'json');

        // dd($mesRegionsArray);
        
        return $this->render('api/index.html.twig', [
            'mesRegionsArray' => $mesRegionsArray
        ]);
    }
}
