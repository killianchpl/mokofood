<?php

require_once "AbstractManager.php";

class PlatManager extends AbstractManager
{
    // récupération des spécialités pour la page principal HOME ( accueil avec 4 plats)
    public function getSpecialites(): array
    {
        $sql = "SELECT * FROM plats LIMIT 4";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Récuparation de l'ensemble des plats ranger par cat 
    public function getAllPlats(): array
    {
        $sql = "SELECT * FROM plats ORDER BY categorie_id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}