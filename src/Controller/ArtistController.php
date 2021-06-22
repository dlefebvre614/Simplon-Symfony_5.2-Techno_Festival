<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="list_artist")
     */
    public function index(): Response
    {
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }

    /**
     * @Route("/artist/{id<\d+})", name="artist")
     */
    public function artist(int $id): Response
    {
        return $this->render('artist/artist.html.twig', [
            'controller_name' => 'ArtistController',
            'id' => $id,
        ]);
    }
}
