<?php

namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class SessionRecipeStorage implements RecipeStorageInterface {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function all() {
        return $_SESSION['recipes'] ?? [];
    }

    public function find($id) {
        return array_filter($this->all(), function($recipe) use ($id) {
            return $recipe->getId() == $id;
        })[0] ?? null;
    }

    public function store(Recipe $recipe) {
        $_SESSION['recipes'][] = $recipe;
    }

    public function update($id, Recipe $recipe) {
        $index = array_search($id, array_column($this->all(), 'id'));
        if ($index !== false) {
            $_SESSION['recipes'][$index] = $recipe;
        }
    }

    public function delete($id) {
        $_SESSION['recipes'] = array_filter($this->all(), function($recipe) use ($id) {
            return $recipe->getId() != $id;
        });
    }
}
