<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\SessionRecipeStorage;
use App\Storage\MySqlDatabaseRecipeStorage;
use App\RecipeManager;


session_start();
// sur mac root & root
$pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// bdd
$storage = new MySqlDatabaseRecipeStorage($pdo);
// session
$manager = new RecipeManager($storage);
$recipe = new Recipe(null, new DateTime(), 'Couscous', 'Description de la recette de couscous', 4, 60);
$manager->addRecipe($recipe);

// Récupération et affichage de toutes les recettes
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
