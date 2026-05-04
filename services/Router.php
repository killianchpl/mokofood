<?php

class Router
{
    public function handleRequest()
    {
        // Si j'ai reçu une route
        if (isset($_GET["route"]))
        {
            if ($_GET["route"] === "histoire")
            {
                $ctrl = new PageController();
                $ctrl->histoire();
            }
            else if ($_GET["route"] === "carte")
            {
                $ctrl = new MenuController();
                $ctrl->index();
            }
            else if ($_GET["route"] === "reservation")
            {
                $ctrl = new ReservationController();
                $ctrl->index();
            }
            else if ($_GET["route"] === "contact")
            {
                $ctrl = new ContactController();
                $ctrl->index();
            }
            else if ($_GET["route"] === "avis")
            {
                $ctrl = new ReviewController();
                $ctrl->index();
            }
            else if ($_GET["route"] === "mentions-legales")
            {
                $ctrl = new PageController();
                $ctrl->mentionsLegales();
            }
            else
            {
                // Route inconnue : erreur 404
                $ctrl = new DefaultController();
                $ctrl->notFound();
            }
        }
        else // Si pas de route : page d'accueil
        {
            $ctrl = new HomeController();
            $ctrl->index();
        }
    }
}