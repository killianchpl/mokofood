<?php 
//accueil site
//héritage : abstractcontroller
class HomeController extends AbstractController
{
    //function, affichage index
public function index(): void
    {
        $this->render("home.html.twig");
    }
}