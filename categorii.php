<?php

require_once "db.php";
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$stmt = $pdo->query("SELECT `kod`, `name` FROM `kategor`");
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
            <a class="navbar-brand" href="#">Городской портал</a>
        </div>
    </div>
</nav>
<main id="main" class="flex-shrink-0" role="main">
             <div class="container">
        <h1>Панель управления</h1>
        <h2>Управление категориями</h2>
        <p>
        <a class="btn btn-info" href="addcat.php">Добавить категорию</a></p>
        <p>
        <a class="btn btn-info" href="deletecat.php">Удаление категории</a></p>
        <table border="1">
            <tr>

                <th>ID</th>
                <th>Название категории</th>
            </tr>
            
            <?php foreach ($client as $key => $clients) : ?>
                <tr>
                    <td><?= htmlspecialchars($clients['kod']) ?></td>
                    <td><?= htmlspecialchars($clients['name']) ?></td>
                </tr>
            <?php endforeach; ?>   
        </table>
             </div>
</main>
</body>
</html>