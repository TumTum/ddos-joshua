<?php

declare(strict_types=1);

namespace joshua\ddos;

class Kern
{
    public function run()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        $twig = new \Twig\Environment($loader);

        $controller = new IndexController();

        if (isset($_POST['fun'])) {
            if ($_POST['fun'] == 'captchatoggle') {
                $controller = new CaptchaController();
            }
        }
        $twig->display($controller->render(), $controller->getData());
    }
}
