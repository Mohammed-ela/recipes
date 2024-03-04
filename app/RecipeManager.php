<?php

namespace App;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class RecipeManager {
    private $storage;

    public function __construct(RecipeStorageInterface $storage) {
        $this->storage = $storage;
    }

    public function addRecipe($name, $description, $people, $preparationTime) {
        $recipe = new Recipe(null, new \DateTime(), $name, $description, $people, $preparationTime);
        $this->storage->store($recipe);
    }

    public function getRecipes() {
        return $this->storage->all();
    }

}
