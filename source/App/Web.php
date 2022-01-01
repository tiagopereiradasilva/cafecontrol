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
        $head = $this->seo->render(
            CONF_SITE_NAME." - ".CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url("/assets/images/share.jpg")
        );
        echo $this->view->render("home", [
            "head" => $head,
            "video"=>"_7yG_K8gFbI"
        ]);
    }

    /**
     * SITE ABOUT
     */
    public function about(): void
    {
        $head = $this->seo->render(
            "Descubra o ".CONF_SITE_NAME." - ".CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/sobre"),
            url("/assets/images/share.jpg")
        );
        echo $this->view->render("about", [
            "head" => $head,
            "video"=>"_7yG_K8gFbI"
        ]);
    }

    /**
     * SITE TERMS
     */
    public function terms(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME." - Termos de uso",
            CONF_SITE_DESC,
            url("/termos"),
            url("/assets/images/share.jpg")
        );
        echo $this->view->render("terms", [
            "head" => $head
        ]);
    }

    /**
     * SITE ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();
        $error->code = $data['errcode'];
        $error->title = "Ooops. Contúdo indisponível :/";
        $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento
        ou foi removido :/";
        $error->linkTitle = "Continue navegando";
        $error->link = url_back();

        $head = $this->seo->render(
          "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            url("/assets/iamges/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}