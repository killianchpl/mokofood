<?php

require_once "AbstractManager.php";
//extension abstractmanager
class AvisManager extends AbstractManager
{
    // On récupère un avis
    public function getLastAvis(): array
    {
        $sql = "SELECT * FROM avis WHERE statut = 'approuve' ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}