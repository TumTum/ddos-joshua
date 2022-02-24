<?php

declare(strict_types=1);

namespace joshua\ddos;

class IndexController extends Controller
{
    protected array $data = [
        'start' => true,
        'success' => false,
        'error' => false,
        'captcha' => false,
        'captcha_id' => '',
        'captcha_word' => '',
    ];

    public function render(): string
    {
        if (isset($_GET['clean'])) {
            $this->data['start'] = false;
        }

        if ($this->captchaOn()) {
            $this->data['captcha'] = true;
            $this->showCaptcha();
        }

        $this->testUsernamePassword();

        return 'index.twig';
    }

    private function captchaOn(): bool
    {
        return file_exists(Capatch::FLAG);
    }

    private function showCaptcha()
    {
        $captcha = new \Laminas\Captcha\Figlet([
            'name'    => 'foo',
            'wordLen' => 3,
            'timeout' => 300,
        ]);

        $this->data['captcha_id'] = $captcha->generate();
        $this->data['captcha_word'] = $captcha->getFiglet()->render($captcha->getWord());
    }

    private function testUsernamePassword()
    {
        if ($this->captchaOn()) {
            $captcha = new \Laminas\Captcha\Figlet([
                'name'    => 'foo',
                'wordLen' => 3,
                'timeout' => 300,
            ]);

            if (!isset($_GET['foo'])) {
                return;
            }

            if (!$captcha->isValid($_GET['foo'], $_GET)) {
                $this->data['start'] = false;
                $this->data['error'] = true;
                return;
            }
        }

        if (isset($_GET['user']) || isset($_GET['pwd'])) {
            $this->data['start'] = false;
            $this->data['error'] = true;

            if (isset($_GET['user']) && !empty($_GET['user']) && $_GET['user'] == 'joshua') {
                $username = true;
            }

            if (isset($username) && isset($_GET['pwd']) && !empty($_GET['pwd']) && $_GET['pwd'] == 'vergessen')
            {
                $this->data['success'] = true;
                $this->data['error'] = false;
            }
        }
    }
}
