<?php

namespace App\Entity;

use Doctrine \ORM\Mapping as ORM;
//j'uttilise Doctrine ORM pour gerer mon entité




#[ORM\Entity]
//Je cree une entité pour la class Cocktail
class Cocktail{

    #[ORM\Id]
    //Je cree un id pour mon entité
    #[ORM\GeneratedValue]
    //Je genere un id automatiquement
    #[ORM\Column]
    //Je cree une colonne pour mon id
    public ?init $id;
    //je cees une variable id de type int

    #[ORM\Column(length: 255)]
    //Je cree une colonne pour mon nom de cocktail 255 caractères max
    public ?string $name;
    //je cree une variable name de type string(Variable de type texte)

    #[ORM\Column(length: 255)]
    public ?string $description;
    //Je cree une colonne pour ma description de cocktail 255 caractères max

    #[ORM\Column(length: 255)]
    //Je cree une colonne pour mes ingredients de cocktail 255 caractères max
    public ?string $ingredients;
    //Je cree une variable ingredients de type string(Variable de type texte)

    #[ORM\Column(length: 255)]
    //Je cree une colonne pour mon image de cocktail 255 caractères max


    public ?string $image;
    //Je cree une variable image de type string(Variable de type texte)

    #[ORM\Column]
    //Je cree une colonne pour ma date de création de cocktail
    public DateTime $createdAt;
    //Je cree une variable createdAt de type DateTime(Variable de type date)

    #[ORM\Column]
    //Je cree une colonne pour mon statut de publication de cocktail
    public bool $ispublished;
    //Je cree une variable ispublished de type booléen(Variable de type vrai ou faux)

    public function __construct($name, $description, $ingredients, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->image = $image;

        $this->createdAt = new \DateTime();
        $this->ispublished = true;

        $this->id = 5;
    }
}