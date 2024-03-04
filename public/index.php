<?php
phpinfo();
require __DIR__ . '/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\SessionRecipeStorage;
use App\Storage\MySqlDatabaseRecipeStorage;
use App\RecipeManager;

// Session
session_start();

// Connexion bdd
$pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// stockage par bdd

$storage = new MySqlDatabaseRecipeStorage($pdo);

$manager = new RecipeManager($storage);

// Exemple d'ajout d'une recette
$recipe = new Recipe(null, new DateTime(), 'Poulet Basquaise', 'Description de la recette', 4, 45);
$manager->addRecipe($recipe);

// Exemple de récupération de toutes les recettes
$recipes = $manager->getRecipes();
echo "<h1>Recettes</h1>";
foreach ($recipes as $recipe) {
    echo "<div>";
    echo "<h2>" . htmlspecialchars($recipe->getName()) . "</h2>";
    echo "<p>" . htmlspecialchars($recipe->getDescription()) . "</p>";
    echo "<p>Pour " . htmlspecialchars($recipe->getPeople()) . " personnes.</p>";
    echo "<p>Temps de préparation : " . htmlspecialchars($recipe->getPreparationTime()) . " minutes.</p>";
    echo "</div>";
}

phpinfo();


// Vous pouvez ajouter des exemples similaires pour la mise à jour et la suppression des recettes
