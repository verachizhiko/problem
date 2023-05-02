<?php
require_once "db.php";
$req2 = $pdo->query("SELECT * FROM `kategor`");
$kategorS = $req2->fetchAll();

$nazvanie = $_POST['nazvanie'];
$nazvanie2 = $_POST['nazvanie2'];
$opisanie =  $_POST['opisanie'];
$select = $_POST['kateg'];

$picktmp = $_FILES['file']['tmp_name'];
$pickname = $_FILES['file']['name'];
$path = "uploads/";
$filedir = $path.$pickname;


try{
    $db = new PDO("mysql:host=localhost;dbname=registr", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    print $e->getMessage();
}

if(isset($_POST['send'])){
    $status = 'Новая';
    $data = $db->prepare("INSERT INTO zayavka (nazvanie, opisanie, categoria, photo, status, password) 
    VALUES (:nazvanie, :opisanie, :categoria, :photo, :status, :nazvanie2 )");
    $data->bindParam(":nazvanie", $nazvanie, PDO::PARAM_STR);
    $data->bindParam(":opisanie", $opisanie, PDO::PARAM_STR);
    $data->bindParam(":categoria", $select, PDO::PARAM_STR);
    $data->bindParam(":photo", $filedir, PDO::PARAM_STR);
    $data->bindParam(":status", $status, PDO::PARAM_STR);
    $data->bindParam(":nazvanie2", $nazvanie2, PDO::PARAM_STR);
    $data->execute();
    move_uploaded_file($picktmp,$filedir);
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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Главная</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <h1>Новая заявка</h1>
        <form method="POST" enctype="multipart/form-data">
                    <input class="form-control" name="nazvanie" type="text" placeholder="Название" required><br>
                    <textarea class="form-control" name="opisanie" placeholder="Описание" required></textarea><br>
                    <select name="kateg" id="kateg" class = "form-control">
                    <?php foreach($kategorS as $kategor): ?>
                        <option value="<?= $kategor['name'] ?>"><?= $kategor['name'] ?></option>
                    <?php endforeach ?>
                </select>
                <br><input name="file" type="file" required><br>
               
                <input class="form-control" name="nazvanie2" type="text" placeholder="Введите пароль для подтверждения" required><br>

                    <button class="btn btn-success" type = "submit" name="send">Отправить</button>
                </form>
    </div>
</div>
</body>
</html>