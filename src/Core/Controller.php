<?php

namespace Wes\Mvc\Core;

class Controller
{
    protected function display(string $view, $content = []): void
    {
        $parsedView = substr($view, strpos($view, '.'));

        $displayView = base_dir . 'src/Views/' . $parsedView . '.php';

        if (file_exists($displayView)) {
            extract($content);

            include $displayView;
        }

    }

}