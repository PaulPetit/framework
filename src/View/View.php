<?php


namespace App\View;

use App\Config;
use App\Session\Session;
use Twig_Extension_Debug;

/**
 * Class View
 * @package App\View
 */
abstract class View
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(Config::getInstance()->get('twig.path'));
        $this->twig = new \Twig_Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);

        $this->twig->addExtension(new Twig_Extension_Debug());
    }

    /**
     * Charge le template Twig et affiche le rendu de la page
     * @param string $template
     * @param array $params
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($template, array $params = [])
    {
        /* ajout de messages flash */
        $params['flashes'] = Session::getInstance()->getFlashes();
        echo $this->twig->render($template, $params);
    }
}
