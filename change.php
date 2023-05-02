<?php
$conn = mysqli_connect("localhost", "root", "", "registr");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
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
        <?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["kod"]))
{
    $userid = mysqli_real_escape_string($conn, $_GET["kod"]);
    $sql = "SELECT `kod`, `nazvanie`, `opisanie`, `categoria`, `data`, `status` FROM `zayavka` WHERE `kod` = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $nazvanie = $row["nazvanie"];
                $opisanie = $row["opisanie"];
                $categoria = $row["categoria"];
                $data = $row["data"];
                $status = $row["status"];
                $file = $row["file"];
            }
            echo "<h3>Обновление статуса</h3>
                <form method='post'>
                    <input type='hidden' name='kod' value='$userid' />
                    <p>Название:
                    <input type='text' name='nazvanie' value='$nazvanie' readonly /></p>
                    <p>Описание:
                    <input type='text' name='opisanie' value='$opisanie' readonly /></p>
                    <p>Категория:
                    <input type='text' name='categoria' value='$categoria' readonly /></p>
                    <p>Дата:
                    <input type='text' name='data'  value='$data' readonly /></p>
                    <p>Статус:
                    <select name = 'status' id = 'social' onchange='i()'><option>Решена</option><option value='Отклонена'>Отклонена</option></select></p>
                    <input type='text' name='prichina' placeholder = 'Введите причину отказа' id='show'/></p>
                    <p>Файл:
                    <input type='file' name='file'/></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Заявка не найдена</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["kod"]) && isset($_POST["nazvanie"]) && isset($_POST["opisanie"])&& isset($_POST["categoria"])&& isset($_POST["data"])&& isset($_POST["status"])) {
      
    $userid = mysqli_real_escape_string($conn, $_POST["kod"]);
    $nazvanie = mysqli_real_escape_string($conn, $_POST["nazvanie"]);
    $opisanie = mysqli_real_escape_string($conn, $_POST["opisanie"]);
    $categoria = mysqli_real_escape_string($conn, $_POST["categoria"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $data = mysqli_real_escape_string($conn, $_POST["data"]);
    $prichina = mysqli_real_escape_string($conn, $_POST["prichina"]);
    $picktmp = $_FILES['file']['tmp_name'];
    $pickname = $_FILES['file']['name'];
    $path = "uploads/";
    $filedir = $path.$pickname; 
    move_uploaded_file($picktmp,$filedir);

    $sql = "UPDATE zayavka SET status = '$status', photo_posle = '$filedir', prichina = '$prichina' WHERE kod = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: zayavki.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
mysqli_close($conn);

?>
<script src="js/script.js"></script>
    </div>
</main>
</body>
</html>