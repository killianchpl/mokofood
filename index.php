<?php
session_start();
//chargement autoload du Composer
require_once __DIR__ .  "/vendor/autoload.php";

//chargement DB
require_once "config/connexion.php";

//chargement classes
require_once "services/Router.php";

 //chargement controllers
require_once "controllers/AbstractController.php";
require_once "controllers/HomeController.php";
require_once "controllers/MenuController.php";
require_once "controllers/ContactController.php";

 //chargement manager
require_once "managers/AbstractManager.php";

//routeur + requete
$router = new Router();
$router->handleRequest();