<?php
    class Controller
    {
        protected function render($view, $data = [])
        {
            extract($data);
            include __DIR__ . "\..\Views\\$view.php";
        }
  
        protected function model($model, $action, $data = [], $var = -1, $var2 = 0)
        {
            $$model = new $model;
            return $$model->$action($data, $var, $var2);
        }
    }
?>