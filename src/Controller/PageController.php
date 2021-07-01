<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PageController extends AbstractController
{
    private $days;
    private $hours;

    public function __construct()
    {
        $this->days = ["20/08/2021", "21/08/2021", "22/08/2021"];
        $this->hours = ["16h-18h", "18h-20h", "21h-23h"];
    }

    /**
     * @Route("/", name="page_home")
     */
    public function home(): Response
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/agenda", name="agenda_home")
     */
    public function agenda(ArtistRepository $artistRepository): Response
    {
        return $this->render('page/agenda.html.twig', [
            'days' => $this->days,
            'hours' => $this->hours,
            'artists' => $artistRepository->findByConcert()
        ]);
    }

    /**
     * @Route("/ticket/artist/{artist_id?0}", name="ticket_home")
     */
    public function ticket(ArtistRepository $artistRepository, int $artist_id): Response
    {
        if (!$this->getUser()) return $this->redirectToRoute('list_artist');
        return $this->render('page/ticket.html.twig', [
            'days' => $this->days,
            'hours' => $this->hours,
            'artists' => $artistRepository->findByConcert(),
            'artist' => $artistRepository->findOneBy(['id' => $artist_id])
        ]);
    }
}
