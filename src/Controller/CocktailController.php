<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CocktailController  extends AbstractController{

    public function TableCocktail(){

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
                'image'         => 'https://t4.ftcdn.net/jpg/12/42/30/11/360_F_1242301142_mCkI4DL69H5gUbgeCRpCB8QZrujzWsEq.jpg',
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
                'image'         => 'https://www.foodandwine.com/thmb/hFWA9xk2wUk0mDHP6n_-17I1r-o=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Junes-Old-Fashioned-FT-BLOG1222-8a001cc392394c6893a3259ecab1369c.jpg',
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
                'image'         => 'https://www.laboutiqueducocktail.com/wp-content/uploads/2023/07/Negroni.jpeg',
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
        return $cocktails;
    }
    #[Route('/', name: 'home')]
    public function lastCocktail(){
        $lastCocktail=$this->TableCocktail();
        $lastCocktail = array_slice($lastCocktail, -2, 2, true); // Récupérer le dernier cocktail de la liste
        
        return $this->render('home.html.twig', [
            'cocktails' => $lastCocktail,
        ]);
    }

    
    #[Route('/cocktails', name : 'list_cocktails')]
    public function listCocktails(){

        $cocktails = $this->TableCocktail();
        return $this->render('list_cocktails.html.twig', [
            'cocktails' => $cocktails,
        ]);
    }


// Route pour afficher un cocktail spécifique en utilisant son ID

    #[Route('/best_cocktails/{id}', name: 'best_cocktails')]
    // Le paramètre {id} est dynamique et sera passé à la méthode BestCocktail
    // Le nom de la route est 'best_cocktails'
public function BestCocktail($id){
    // On appelle la méthode TableCocktail pour récupérer la liste des cocktails
    // On utilise l'ID passé dans l'URL pour récupérer le cocktail correspondant
    $cocktails = $this->TableCocktail();
    $bestCocktail = $cocktails[$id] ?? null; // Récupéré les cocktails via l'id
    // Si l'ID n'existe pas, on renvoie null
    // On vérifie si le cocktail existe, sinon on peut gérer l'erreur (rediriger ou afficher un message d'erreur 404)
    return $this->render('best_cocktail.html.twig',[
        'bestCocktail' => $bestCocktail
        // On passe le cocktail à la vue pour l'afficher
        // On utilise la méthode render pour afficher le template best_cocktail.html.twig

    ]);


    }
}