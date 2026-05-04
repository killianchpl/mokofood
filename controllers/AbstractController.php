<?php
// heritage pour les controllers
abstract class AbstractController
{
    //stockage instance twig
    private \Twig\Environment $twig;

    //execution du constructeur
    public function __construct()
    {
        //finding dossier templates
        // : dossier views
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
        //stockage de this->twig pour render()
        $this->twig = new \Twig\Environment($loader, [
            'debug' => true,
        ]);
    }

    //affichage vue twig
    // ici views peut être = index.html.twig ...
    protected function render(string $view, array $data = []): void
    {
        echo $this->twig->render($view, $data);
    }

    //redirection versune autre url / arrêt php
    protected function redirect(string $route): void
    {
        header("Location: index.php?route=" . $route);
        exit;
    }
}