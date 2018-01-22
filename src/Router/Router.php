<?php

namespace App\Router;

use App\Controller\TestController;

/**
 * Class Router
 * @package App\Router
 */
class Router
{
    /**
     * @var null|Router
     */
    private static $instance = null;

    /**
     * @return Router
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Déclaration des routes et appel de la bonne page
     */
    public function init()
    {
        if (!isset($_GET['page'])) {
            $this->redirect('index.php?page=home');
        }
        $requestedPage = $_GET['page'];

        switch ($requestedPage) {
            case 'home':
                (new TestController())->displayHomeAction();
                break;
            case 'flash':
                (new TestController())->addFlash();
                break;
            case 'mail':
                (new TestController())->sendMail();
                break;
            default:
                echo "404 page inconnue";
                break;
        }
    }

    /**
     * Redirige le navigateur vers la page demandée
     * Si $isPage == true, on redirige vers la bonne pas sans avoir besoin d'indiquer l'url complet
     * @param $url
     * @param bool $isPage
     */
    public function redirect($url, $isPage = false)
    {
        if ($isPage) {
            $url = 'index.php?page=' . $url;
        }
        echo "<script> console.log('Redirection vers : {$url}') </script>";
        echo "<script> window.location = '{$url}' </script>";
        exit();
    }
}
