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
        $border_color = ["secondary", "danger", "info", "warning", "light", "success"];
        $bg_color = ["secondary", "danger", "info", "warning"];

        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'border_colors' => $border_color,
            'bg_colors' => $bg_color,
        ]);
    }

    /**
     * @Route("/artist/{id<\d+})", name="show_artist")
     */
    public function show(int $id): Response
    {
        return $this->render('artist/artist.html.twig', [
            'controller_name' => 'ArtistController',
            'id' => $id,
        ]);
    }
}
