<?php

namespace app\widgets;

use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{

    public $supportedLanguages = [
        'en-US',
        'uz-UZ',
        'ru-RU',
    ];

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        $cookieLanguage = $app->request->cookies['language'];
        if (isset($cookieLanguage) && in_array($cookieLanguage, $this->supportedLanguages)){
            $app->language = $cookieLanguage;
        }
    }
}