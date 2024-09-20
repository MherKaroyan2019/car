<?php
    $fileexplode = explode("\\", __FILE__);
    $file = $fileexplode[count($fileexplode)-1];
    $name = explode(".", $file)[0];
    $router = require '../Routes/DefaultRouter.php';
?>