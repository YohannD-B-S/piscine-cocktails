<?php

namespace App\Entity;

class Cocktail{
    public $id;
    public $name;
    public $description;
    public $ingredients;
    public $image;
    public $createdAt;
    public $ispublished;

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