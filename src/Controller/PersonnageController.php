<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    /**
     * Matches /personnage exactly
     * @Route("/personnage", name="personnageRandom")
     */
    public function personnageRandom()
    {
        $aHello = ["Hi","Yo", "What's up", "Bien ou bien"];
        shuffle($aHello);

        $num_character = rand(1,600);

        $GOT_character =  
            file_get_contents("https://anapioficeandfire.com/api/characters/${num_character}");
            dump($GOT_character);

        //vue 
        return $this->render('home/index.html.twig', [
            'aHello' => $aHello,
            'char' => json_decode($GOT_character)
        ]);
    }

    /**
     * Matches /personnage/*
     * @Route("/personnage/{num}", name="personnage ", requirements={"page"="\d+"})
     */
    public function personnage($num)
    {
        $aHello = ["Hi","Yo", "What's up", "Bien ou bien"];
        shuffle($aHello);

        //$num_character = num;

        $GOT_character =  
            file_get_contents("https://anapioficeandfire.com/api/characters/${num}");
            dump($GOT_character);

        //vue 
        return $this->render('home/index.html.twig', [
            'aHello' => $aHello,
            'char' => json_decode($GOT_character)
        ]);
    }


}
