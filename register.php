<?php
require_once "db.php";
$stmt = $pdo->query("SELECT * FROM `client`");
$works = $stmt->fetchAll();
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
<div class="jumbotron">
    <div class="container">
    <div class="w-40">
        <h1>Регистрация</h1>
                <form action = "check.php" method="POST">
                    <input class="form-control" name="surname" type="text" placeholder="Фамилия" required><br>
                    <input class="form-control" name="name" type="text" placeholder = "Имя" required><br>
                    <input class="form-control" name="otch" type="text" placeholder = "Отчество" required><br>
                    <input class="form-control" name="login" type="text" placeholder = "Логин" required><br>
                    <input class="form-control" name="email" type="email" placeholder = "E-mail" required><br>
                    <input class="form-control" name="password" type="text" placeholder = "Пароль" required><br>
                    <input class="form-control" name="password2" type="text" placeholder = "Повторите пароль" required><br>
                    <input type="checkbox" name = "sogl"required>Подтвердите согласие на обработку персональных данных<br>
                    <br><button class="btn btn-success" type = "submit">Зарегистрироваться</button>
                </form>
            </div>
        </p>
    </div>
</div>
</body>
</html>