<?php

namespace App\Mailer;

use App\Config;
use Twig_Extension_Debug;

class MailRenderer
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var null|MailRenderer
     */
    private static $instance = null;

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
     * @return MailRenderer|null
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Charge le template Twig et retourne le rendu de l'email
     * @param $mailTemplate
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function renderMail($mailTemplate, $params = [])
    {
        return self::getInstance()->getTwig()->render($mailTemplate, $params);
    }

    /**
     * @return \Twig_Environment
     */
    private function getTwig()
    {
        return $this->twig;
    }
}
