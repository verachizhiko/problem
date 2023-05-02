<?php

require_once "db.php";
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
session_start();
$stmt = $pdo->query("SELECT `surname`, `name`, `otch`, `email`, `login` FROM `client` where `password` = '".$_SESSION['password']."'");
$client = $stmt->fetchAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
        table {
      border-collapse: collapse;
      width: 100%;
        }
         td,
        th {
            padding: 10px;
        }

    .admin-img-wrapper {
    
    margin-bottom: 30px;
    }
    .admin-img-wrapper .img-wrapper {
     margin-bottom: 0;
    }
    </style>
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
<main id="main" class="flex-shrink-0" role="main">
             <div class="container">
        <h1>Личный кабинет</h1>
        <p>
        <table border="1">
            <tr>
                <th>#</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>E-mail</th>
                <th>Логин</th>
            </tr>
            
            <?php foreach ($client as $key => $clients) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= htmlspecialchars($clients['surname']) ?></td>
                    <td><?= htmlspecialchars($clients['name']) ?></td>
                    <td><?= htmlspecialchars($clients['otch']) ?></td>
                    <td><?= htmlspecialchars($clients['email']) ?></td>
                    <td><?= htmlspecialchars($clients['login']) ?></td>
                </tr>
            <?php endforeach; ?>           
        </table>
        </p>
        
    </div>
    
</main>
</body>
</html>