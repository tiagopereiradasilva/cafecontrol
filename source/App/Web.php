<?php


namespace Source\App;


use Source\Core\Controller;

/**
 * Class Web
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/".CONF_VIEW_THEME."/");
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
        echo $this->view->render("home", [
            "title" => "CaféControl - Gerencie suas contas com o melhor café"
        ]);
    }

    /**
     * SITE ABOUT
     */
    public function about(): void
    {
        echo "<h1>Sobre</h1>";
    }

    /**
     * SITE ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        echo $this->view->render("erro", [
            "title" => "{$data['errcode']} | Ooops"
        ]);
    }
}