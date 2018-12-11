<?php

namespace App;

/**
 * Class View
 * @package App
 *
 * Формирует представление и направляет в поток вывода
 */
class View implements \Countable, \Iterator
{
    use Accessor;
    use Iterator;

    /**
     * Возвращает сформирование представление
     *
     * @param string $template  Абсолютный путь до шаблона представления
     * @return string
     */
    public function render(string $template)
    {
        extract($this->data);

        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * Направляет представление в поток вывода
     *
     * @param string $template  Абсолютный путь до шаблона представления
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }

    /**
     * Реализация стандартного интерфейса Countable
     *
     * @return int  Количество объектов направляемых в шаблон
     */
    public function count()
    {
        return count($this->data);
    }
}

