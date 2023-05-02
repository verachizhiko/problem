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
        <h1>Вход</h1>
        <form action = "auth.php" method="POST">
                    <input class="form-control" name="login" type="text" placeholder="Введите логин" required><br>
                    <input class="form-control" name="password" type="password" placeholder = "Введите пароль" required><br>
                    <button class="btn btn-success" type = "submit">Войти</button>
                </form>
        <p>
        </p>
    </div>
</div>
</body>
</html>