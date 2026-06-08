<?php 

// Import des managers
require_once "managers/PlatManager.php";
require_once "managers/AvisManager.php";

// Accueil site
// Héritage : AbstractController
class HomeController extends AbstractController
{
    // Affichage de la page d'accueil
    public function index(): void
    {
        // Instanciation des managers
        $platManager = new PlatManager();
        $avisManager = new AvisManager();

        // Récupération des données
        //ajout de 4plats pour page d'accueil
        $plats = $platManager->getSpecialites();
        // ajout derniers avis en date pour la page d'accueil
        $avis = $avisManager->getLastAvis();

        // Envoi des données à la vue
        $this->render("home.html.twig", [
            "plats" => $plats,
            "avis" => $avis
        ]);
    }
}