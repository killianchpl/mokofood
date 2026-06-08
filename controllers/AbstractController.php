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
         $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        $data['base_path'] = ($scriptDir === '/' ? '' : $scriptDir) . '/';

        echo $this->twig->render($view, $data);
    }

    //redirection versune autre url / arrêt php
    protected function redirect(string $route): void
    {
        header("Location: index.php?route=" . $route);
        exit;
    }

    // Génère un token CSRF, le stocke en session et le renvoie (cf. M5)
    protected function generateCsrfToken(): string
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }

    // Vérifie qu'un token reçu correspond à celui stocké en session (cf. M5)
    protected function validateCsrfToken(string $token): bool
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
