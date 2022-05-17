<?php

namespace App\Controller;

use IcndbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViccekController extends AbstractController
{
    /**
     * @Route("/{size}/{mod}")
     * @param int $size
     * @param int $mod
     * @return Response
    */
    public function index(int $size, int $mod): Response
    {
        $icndbService = new IcndbService();
        $jokes = $icndbService->getJokes($size);

        return $this->render('index.html.twig', [
            'jokes' => $jokes,
            'mod' => $mod
        ]);
    }
}