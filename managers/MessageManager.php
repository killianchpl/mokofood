<?php

require_once "AbstractManager.php";

// Gestion de la table "message"
class MessageManager extends AbstractManager
{
    // Insertion d'un nouveau message envoyé via le formulaire de contact
    public function createMessage(string $prenom, string $nom, string $email, string $message): void
{
    $sql = "INSERT INTO messages (prenom, nom, email, message) VALUES (:prenom, :nom, :email, :message)";
    $stmt = $this->getDb()->prepare($sql);
    $stmt->execute([
        "prenom" => $prenom,
        "nom" => $nom,
        "email" => $email,
        "message" => $message
    ]);
}
}
