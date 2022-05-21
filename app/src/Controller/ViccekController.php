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

        //maximalizáljuk a viccek számák 50-re
        if ($size > 50) {
            $jokesLimit = 'Bocsi, a viccek száma 50-re van korlátozva';
            $size = 50;
        }
        $jokes = $icndbService->getJokes($size);

        if ($jokes == '') {
            $noJokes = 'Elnézést, a viccek átmenetileg nem elérhetőek, próbáld meg később!';
        }

        return $this->render('index.html.twig', [
            'jokes' => $jokes,
            'mod' => $mod,
            'jokesLimit' => $jokesLimit ?? '',
            'noJokes' => $noJokes ?? ''
        ]);
    }
}