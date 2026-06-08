<?php

require_once "AbstractManager.php";

class CategorieManager extends AbstractManager
{
    // On récupère toutes les catégories (pour les pilules de filtre)
    public function getAllCategories(): array
    {
        $sql = "SELECT * FROM categories ORDER BY id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}