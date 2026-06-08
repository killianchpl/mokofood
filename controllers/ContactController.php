<?php

// Import du manager
require_once "managers/MessageManager.php";

// Page Contact
// Héritage : AbstractController
class ContactController extends AbstractController
{
    // Affichage ET traitement du formulaire de contact
    public function index(): void
{
    $errors = [];
    $success = false;

    // ----- Affichage du formulaire (aucun envoi) -----
    if (empty($_POST)) {
        // Succès en attente après une redirection (PRG) ?
        if (isset($_SESSION['contact_success'])) {
            $success = true;
            unset($_SESSION['contact_success']);
        }

        $this->render("contact.html.twig", [
            "csrf_token" => $this->generateCsrfToken(),
            "errors" => $errors,
            "success" => $success,
            "old" => []
        ]);
    }
        // ----- Traitement de l'envoi -----
    else {
        // 1. Token CSRF
        $token = $_POST["csrf_token"] ?? "";
        if (!$this->validateCsrfToken($token)) {
            $errors[] = "Session expirée ou invalide. Merci de renvoyer le formulaire.";
        }

        // 2. Récupération des champs
        $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : "";
        $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $message = isset($_POST["message"]) ? trim($_POST["message"]) : "";

        // 3. Validation
        if ($prenom === "") {
            $errors[] = "Le prénom est obligatoire.";
        }
        if ($nom === "") {
            $errors[] = "Le nom est obligatoire.";
        }
        if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Un email valide est obligatoire.";
        }
        if ($message === "") {
            $errors[] = "Le message est obligatoire.";
        }

        // 4. Insertion + PRG
        if (empty($errors)) {
            $messageManager = new MessageManager();
            $messageManager->createMessage($prenom, $nom, $email, $message);

            // succès et rafraichissement 0
            $_SESSION['contact_success'] = true;
            $this->redirect("contact");
        }

           // 5. On n'arrive ici qu'en cas d'erreur : on réaffiche avec les valeurs saisies
        $this->render("contact.html.twig", [
            "csrf_token" => $this->generateCsrfToken(),
            "errors" => $errors,
            "success" => false,
            "old" => [
                "prenom" => $prenom,
                "nom" => $nom,
                "email" => $email,
                "message" => $message
]
            ]);
        }
    }
}
