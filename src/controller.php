<?php
    class Controller
    {
        protected function render($view, $data = [])
        {
            include "Views/$view.php";
        }
  
        protected function model($model, $action, $data = [], $var = -1)
        {
            $$model = new $model;
            return $$model->$action($data, $var);
        }
    }
?>