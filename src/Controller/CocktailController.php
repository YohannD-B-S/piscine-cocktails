<?php

namespace App\Controller;

use App\Entity\Cocktail;
use App\Repository\CocktailCategoriesRepository;
use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
       
        $category = $categorieRepository->findCategoryById($id);

        return $this->render('category_details.html.twig',[
            'category' => $category,
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
    #[Route('/create_cocktail', name: 'create-cocktail')]
    public function createCocktail(Request $request){
        // La méthode Request permet de récupérer les données envoyées par le formulaire
        // La méthode isMethod vérifie si la requête est de type POST (envoi de données)

        if($request-> isMethod('POST')){
            $name=$request->request->get('name'); // Récupérer le nom du cocktail depuis le formulaire
            $description=$request->request->get('description'); // Récupérer la description du cocktail depuis le formulaire
            $ingredients=$request->request->get('ingredients'); // Récupérer les ingrédients du cocktail depuis le formulaire
            $image=$request->request->get('image'); // Récupérer l'image du cocktail depuis le formulaire

            $cocktail = new Cocktail($name, $description, $ingredients, $image);
            //On crée une nouvelle instance de la classe Cocktail avec les données du formulaire

            $this->addFlash('success', "Le cocktail " . $cocktail->name . " a bien été créé");
            // On utilise la méthode addFlash pour afficher un message de succès à l'utilisateur
        }
        return $this->render('create_cocktail.html.twig');
    }
}

