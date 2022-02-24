<?php

declare(strict_types=1);

namespace joshua\ddos;

class CaptchaController extends Controller
{

    protected array $data = [
        'success' => true,
        'error' => false
    ];
    public function render(): string
    {
        if ($_POST['captcha'] == 'on') {
            file_put_contents(Capatch::FLAG, 'on');
        } else {
            @unlink(Capatch::FLAG);
        }

        if (file_exists(Capatch::FLAG)) {
            $this->data['success'] = true;
            $this->data['error'] = false;
        } else {
            $this->data['success'] = false;
            $this->data['error'] = true;
        }

        return 'captache.twig';
    }
}
