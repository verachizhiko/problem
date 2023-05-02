<?php
setcookie('user', $user['password'], time() - 3600, "/");
header('Location: index.php');
?>