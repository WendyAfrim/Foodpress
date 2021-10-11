<?php

namespace App\Core;

use Exception;

class View
{

    private $view;
    private $template;
    private $data = [];

    public function __toString()
    {

        // $msg = "Le template c'est : " . $this->template . "<br>";
        // $msg .= "La vue c'est : " . $this->view . "<br>";
        // $msg .= "Voici les données  : " . serialize($this->data) . "<br>";

        // $msg = "Voici les données  : " . serialize($this->data) . "<br>";

        return $msg;
    }

    public function __construct($view, $template)
    {
        $this->view = $view;
        $this->template = $template;

        $this->setTemplate($template);
        $this->setView($view);
    }

    public function setTemplate($template)
    {
        if (file_exists("src/Views/Templates/" . $template . ".php")) {

            $this->template = "src/Views/Templates/" . $template . ".php";
            // $this->template = "../Views/Templates/" . $template . ".php";
        } else {
            die();
        }
    }

    public function setView($view)
    {
        if (file_exists("src/Views/" . $view . ".php")) {
            $this->view = "src/Views/" . $view . ".php";
        } else {
            die();
        }
    }


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __destruct()
    {

        extract($this->data);
        require $this->template;
    }

    public function renderHtml()
    {
        return $this->html;
    }
}
