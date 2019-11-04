<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        $aHello = ["Hi","Yo", "What's up", "Bien ou bien"];
        shuffle($aHello);

        $GOT_character =  
            file_get_contents('https://anapioficeandfire.com/api/characters/583');
            dump($GOT_character);

        //vue 
        return $this->render('home/index.html.twig', [
            'aHello' => $aHello,
            'char' => json_decode($GOT_character)
        ]);
    }
}
