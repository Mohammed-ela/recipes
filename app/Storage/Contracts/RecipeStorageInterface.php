<?php

namespace App\Storage\Contracts;

use App\Models\Recipe;

interface RecipeStorageInterface {
    public function all();
    public function find($id);
    public function store(Recipe $recipe);
    public function update($id, Recipe $recipe);
    public function delete($id);
}
