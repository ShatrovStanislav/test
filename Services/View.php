<?php

namespace App\Services;

class View
{
    protected $path;

    protected $data = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    protected function render($template)
    {
        extract($this->data);
        ob_start();
        include $this->path . $template . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }
}