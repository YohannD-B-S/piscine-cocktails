<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeCocktailController  extends AbstractController{



    #[Route('/', name: 'home')]
    public function lastCocktail(){

        $cocktails = [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'https://images.unsplash.com/photo-1581404917879-42eeb2e57f0d', // photo libre de droits
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],
        
            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'https://images.unsplash.com/photo-1564758567405-87dfa5f9f90e',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],
        
            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'https://images.unsplash.com/photo-1570528738765-1fd6e623c470',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],
        
            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'https://media.istockphoto.com/id/1469171546/fr/photo/cocktail-pina-colada-aux-cerises-ananas-et-feuilles.jpg?s=612x612&w=0&k=20&c=1GuFS5Ophf64vtX2CjjcaAEjexovGgWXKhAyTmqcjB4=',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],
        
            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'https://images.unsplash.com/photo-1583781922630-e461fa27535c',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
        ];

        $lastCocktail=array_slice($cocktails,-2,2,true);






        return $this->render('home.html.twig', [
            'cocktails' => $lastCocktail,
        ]);
    }
}