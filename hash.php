<?php

// Ce fichier sert uniquement à générer le hash du mot de passe admin
// On le supprimera après utilisation
// Choisis un mot de passe pour ton admin
$password = "MUNDAMmokofood(1105)";

// password_hash() génère un hash sécurisé avec bcrypt
echo password_hash($password, PASSWORD_DEFAULT);