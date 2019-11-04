<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MaisonsController extends AbstractController
{
    /**
     * @Route("/maisons", name="maisons")
     */
    public function infosMaison()
    {

        $GOT_houses =  
            file_get_contents("https://anapioficeandfire.com/api/houses");
            dump($GOT_houses);


        return $this->render('maisons/index.html.twig', [
            'house' => json_decode($GOT_houses)
        ]);
    }
}
