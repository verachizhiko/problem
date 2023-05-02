<?php 
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$otch = filter_var(trim($_POST['otch']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password2 = filter_var(trim($_POST['password2']), FILTER_SANITIZE_STRING);


if (mb_strlen($login) < 5 || mb_strlen($login) > 10){
    echo "Недопостумая длина логина";
    exit();
} else if (mb_strlen($password) < 5 || mb_strlen($password) > 10){
    echo "Недопостумая длина пароля";
    exit();
}else if(mb_strlen($email) < 5 || mb_strlen($email) > 30){
    echo "Недопостумая длина email";
    exit();
} else if($password != $password2){
    echo "Пароли не совпадают!";
    exit();
}


$mysql = new mysqli ('localhost', 'root', '', 'registr');
$mysql->query("INSERT INTO `client` (`surname`, `name`, `otch`, `login`, `email`, `password`)
VALUES ('$surname', '$name', '$otch', '$login', '$email', '$password')");

$mysql->close();
$success = 'Заявка принята';

header('Location: index.php');
?>



