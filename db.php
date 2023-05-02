<?php

$pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=registr;charset=utf8', 'root', '',[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);