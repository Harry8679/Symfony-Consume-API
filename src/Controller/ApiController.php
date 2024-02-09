<?php

namespace App\Controller;

use App\Entity\Region;
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
        $mesRegionsObjets = $serializer->denormalize($mesRegionsArray, 'App\Entity\Region[]');
        // dd($mesRegionsObjets);

        // dd($mesRegionsArray);
        
        return $this->render('api/index.html.twig', [
            'mesRegionsArray' => $mesRegionsObjets
        ]);
    }
}
