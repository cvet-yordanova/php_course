<?php

namespace App\Http;

abstract class HttpHandlerAbstract
{
    private $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function render(string $templateName, $data = null)
    {
        return $this->template->render($templateName, $data );
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}