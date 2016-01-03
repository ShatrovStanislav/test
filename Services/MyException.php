<?php

namespace App\Services;

class MyException
    extends \Exception
{
    protected $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    protected function render()
    {
        ob_start();
        include __DIR__ . '/../Views/Exceptions/' . $this->template . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display()
    {
        echo $this->render();
    }
}