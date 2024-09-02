<?php
    $config = json_decode(file_get_contents(__DIR__ . "\..\..\config.json"), true);
    
    $db = mysqli_connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }
?>