<?php

namespace App\Controller;

use App\Repository\CocktailCategoriesRepository;
use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CocktailController  extends AbstractController{
      

    #[Route('/categories', name: 'list-categories')]
    public function listCatgories(CocktailCategoriesRepository $categorieRepository){
        // en inserant ainsi les parametres on crée une intsance de la classe CocktailCategoriesRepository
        // et on l'injecte dans la méthode listCategories
        $categories = $categorieRepository->findCategories();

        return $this->render('list_categories.html.twig', [
            'categories' => $categories,

            
        ]);
        
    }

    #[Route('/categories/{id}', name: 'category-details')]
    public function categoryDetails(CocktailCategoriesRepository $categorieRepository, $id){
        // en inserant ainsi les parametres on crée une intsance de la classe CocktailCategoriesRepository
        //ça nous évite de faire un "new" 
        // et on l'injecte dans la méthode listCategories
        // on ajout $id pour récupérer l'id de la catégorie
       
        $categories = $categorieRepository->findCategoryById($id);

        return $this->render('category_details.html.twig',[
            'category' => $categories,
        ]);
    }
    


    #[Route('/', name: 'home')]
    public function lastCocktail(CocktailsRepository $cocktailsRepository){
        $cocktails = $cocktailsRepository->findAll();

        $lastCocktails = array_slice($cocktails, -2, 2, true); // Récupérer le dernier cocktail de la liste
        
        return $this->render('home.html.twig', [
            'cocktails' => $lastCocktails,
        ]);
    }

    
    #[Route('/cocktails', name : 'list_cocktails')]
    public function listCocktails(CocktailsRepository $cocktailsRepository){

        $cocktails = $cocktailsRepository->findAll(); // Récupérer tous les cocktails
    
        return $this->render('list_cocktails.html.twig', [
            'cocktails' => $cocktails, // Passer le cocktail à la vue)
    
        ]);
    }


// Route pour afficher un cocktail spécifique en utilisant son ID

    #[Route('/best_cocktails/{id}', name: 'best_cocktails')]
    // Le paramètre {id} est dynamique et sera passé à la méthode BestCocktail
    // Le nom de la route est 'best_cocktails'
public function BestCocktail(CocktailsRepository $cocktailsRepository, $id){
    
    $cocktail = $cocktailsRepository->findOneById($id); // Récupérer tous les cocktails

    return $this->render('best_cocktail.html.twig', [
        'cocktail' => $cocktail, // Passer le cocktail à la vue)

    ]);


    }
}

