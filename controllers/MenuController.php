<?php

// Import des managers
require_once "managers/PlatManager.php";
require_once "managers/CategorieManager.php";

// Page La carte
// Héritage : AbstractController
class MenuController extends AbstractController
{
    // Affichage de la carte
    public function index(): void
    {
        // Instanciation des managers
        $platManager = new PlatManager();
        $categorieManager = new CategorieManager();

        // Récupération des données
        $plats = $platManager->getAllPlats();
        $categories = $categorieManager->getAllCategories();

        // Envoi des données à la vue
        $this->render("carte.html.twig", [
            "plats" => $plats,
            "categories" => $categories
        ]);
    }
}