<?php

namespace App\Controller;

use App\Model\Model;
use App\View\View;

abstract class Controller
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var View
     */
    protected $view;

    /**
     * Appelle le bon modèle et la bonne vue pour le constructeur
     */
    public function __construct()
    {
        $m = "App\Model\\" . str_replace('Controller', '', (new \ReflectionClass($this))->getShortName()) . 'Model';
        $v = "App\View\\" . str_replace('Controller', '', (new \ReflectionClass($this))->getShortName()) . 'View';

        $this->model = new $m();
        $this->view = new $v();
    }
}
