<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

session_start();
//now you are able to use this
$_SESSION['password'] = "$password";

$mysql = new mysqli ('localhost', 'root', '', 'registr');
$result = $mysql->query(("SELECT * FROM `client` WHERE `login` = '$login'
AND `password` = '$password'"));

$user = $result ->fetch_assoc();

if(count($user) == 0){
    echo "Такой пользователь не найден";
    exit();
} else if($login = 'admin' && $password = 'adminWSR')
{
    setcookie('password', $user['password'], time() + 3600, "/");
}
setcookie('user', $user['name'], time() + 3600, "/");


$mysql->close();


header('Location:index.php')
?>