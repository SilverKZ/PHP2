<?php

namespace App;

class View
{
    use Accessor;

    public function render(string $template)
    {
        extract($this->data);

        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }
}

