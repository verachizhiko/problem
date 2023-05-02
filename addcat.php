<?php

$nazvanie = $_POST['cname'];


try{
    $db = new PDO("mysql:host=localhost;dbname=registr", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    print $e->getMessage();
}

if(isset($_POST['send'])){
    $data = $db->prepare("INSERT INTO kategor (name) 
    VALUES (:cname)");
    $data->bindParam(":cname", $nazvanie, PDO::PARAM_STR);
    $data->execute();
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Городской портал</a>
        </div>
    </div>
</nav>
<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <h1>Панель управления</h1>
        <h2>Добавление категории</h2>
        <form method="POST">
                    <input class="form-control" name="cname" type="text" placeholder="Название" required><br>
                    <button class="btn btn-success" type = "submit" name="send">Отправить</button>
        </form>
    </div>
</main>
</body>
</html>