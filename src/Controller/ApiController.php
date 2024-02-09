<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route('/liste-regions', name: 'listRegion')]
    public function index(): Response
    {
        $mesRegions = file_get_contents('https://geo.api.gouv.fr/regions');

        dd($mesRegions);
        
        return $this->render('api/index.html.twig');
    }
}
