<?php

namespace App\Controller;

use App\Repository\CocktailCategoriesRepository;
use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CocktailController  extends AbstractController{
      

    #[Route('/categories', name: 'list-categories')]
    public function listCatgories(){
        $categorieRepository = new CocktailCategoriesRepository;
        $categories = $categorieRepository->findCategories();

        return $this->render('list_categories.html.twig', [
            'categories' => $categories,

            
        ]);
        
    }

    #[Route('/categories/{id}', name: 'category-details')]
    public function categoryDetails($id){
        $categorieRepository = new CocktailCategoriesRepository;
        $categories = $categorieRepository->findCategoryById($id);

        return $this->render('category_details.html.twig',[
            'category' => $categories,
        ]);
    }
    


    #[Route('/', name: 'home')]
    public function lastCocktail(){
        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        $lastCocktails = array_slice($cocktails, -2, 2, true); // Récupérer le dernier cocktail de la liste
        
        return $this->render('home.html.twig', [
            'cocktails' => $lastCocktails,
        ]);
    }

    
    #[Route('/cocktails', name : 'list_cocktails')]
    public function listCocktails(){

        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll(); // Récupérer tous les cocktails
    
        return $this->render('list_cocktails.html.twig', [
            'cocktails' => $cocktails, // Passer le cocktail à la vue)
    
        ]);
    }


// Route pour afficher un cocktail spécifique en utilisant son ID

    #[Route('/best_cocktails/{id}', name: 'best_cocktails')]
    // Le paramètre {id} est dynamique et sera passé à la méthode BestCocktail
    // Le nom de la route est 'best_cocktails'
public function BestCocktail($id){
    
    $cocktailsRepository = new CocktailsRepository;
    $cocktail = $cocktailsRepository->findOneById($id); // Récupérer tous les cocktails

    return $this->render('best_cocktail.html.twig', [
        'cocktail' => $cocktail, // Passer le cocktail à la vue)

    ]);


    }
}

