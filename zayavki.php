<?php

require_once "db.php";
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$stmt = $pdo->query("SELECT `nazvanie`, `opisanie`, `categoria`, `data`, `status` FROM `zayavka`");
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
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <h1>Управление заявками</h1>
        <p>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `kod`, `nazvanie`, `opisanie`, `categoria`, `data`, `status` FROM `zayavka`";
            if($result = mysqli_query($conn, $sql)){
                echo "<table><tr><th>ID</th><th>Название</th><th>Описание</th><th>Категория</th><th>Дата</th><th>Статус</th><th></th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>" . $row["kod"] . "</td>";
                    echo "<td>" . $row["nazvanie"] . "</td>";
                    echo "<td>" . $row["opisanie"] . "</td>";
                    echo "<td>" . $row["categoria"] . "</td>";
                    echo "<td>" . $row["data"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td><a href='change.php?kod=" . $row["kod"] . "'>Изменить</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
        </p>
    </div>
</div>
</body>
</html>