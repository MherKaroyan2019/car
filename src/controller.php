<?php
    class Controller
    {
        protected function render($view, $data = [])
        {
            include "Views/$view.php";
        }
    }
?>