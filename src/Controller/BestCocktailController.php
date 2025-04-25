<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class BestCocktailController extends AbstractController{

#[Route('/best_cocktails', name: 'best_cocktails')]
public function BestCocktail(){

    $cocktails = [
        1 => [
            'id'            => 1,
            'nom'           => 'Mojito',
            'image'         => 'https://media.istockphoto.com/id/1212172937/fr/photo/deux-mojitos-frais-et-froids-avec-des-gla%C3%A7ons-des-tranches-de-lime-et-des-feuilles-de-menthe.jpg?s=612x612&w=0&k=20&c=JHjZDYgroHt-hdGpG_fXRmyQuU2r-xJ1VtEL5Dcbn10=', // photo libre de droits
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
            'image'         => 'https://media.istockphoto.com/id/1503711105/fr/photo/cocktail-margarita-au-citron-vert.jpg?s=612x612&w=0&k=20&c=_CB35pXdk-dCk-BKJ002Oo1Y27gw4ZPp3Ag7yxeIjjs=',
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
            'image'         => 'https://media.istockphoto.com/id/1286685532/photo/old-fashioned-cocktail-with-an-orange-twist.jpg?s=612x612&w=0&k=20&c=AVP-3mjL3ZlWLorJ6OpAVZzeNzWmDZ9ZtkCBraIHa3E=',
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
            'image'         => 'https://media.istockphoto.com/id/922744216/fr/photo/cocktail-negroni-sur-une-vieille-planche-de-bois-boire-avec-gin-campari-martini-rosso-et-orange.jpg?s=612x612&w=0&k=20&c=lAd2NPknBKziy-VjaPdNtoaSE2KFtlpVsrAYv2D-jCU=',
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

    $bestCocktail = $cocktails[3] ?? null;

    return $this->render('best_cocktail.html.twig',[
        'bestCocktail' => $bestCocktail,
    ]);
}
}