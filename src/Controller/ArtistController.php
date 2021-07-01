<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Service\CategoryHandler;
use App\Entity\Artist;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    private array $categories;
    private ArtistRepository $artistRepository;

    public function __construct(ArtistRepository $artistRepository, CategoryRepository $categoryRepository, CategoryHandler $categoryHandler)
    {
        $this->categories = $categoryHandler->handle($categoryRepository->findAll());
        $this->artistRepository = $artistRepository;
    }

       /**
     * @Route("/artist", name="list_artist")
     */
    public function index(): Response
    {
        return $this->render('artist/index.html.twig', [
            'categories' => $this->categories,
            'artists' => $this->artistRepository->findAll()
        ]);
    }

    /**
     * @Route("/artist/{id<\d+>}", name="artist_show")
     */
    public function show(Artist $artist): Response
    {
        return $this->render('artist/artist.html.twig', [
            'artist' => $this-> artistRepository->find($artist)
        ]);
    }

    /**
     * @Route("/artist/category/{id<\d+>}", name="category_id")
     */
    public function artist_category(CategoryRepository $categoryRepository,ArtistRepository $artistRepository,$id): Response
    {
        $categories = $categoryRepository->findAll();

        $artists = $artistRepository->findBy(['category' =>$id]);

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'categories' => $categories,
        ]);

    }
}

