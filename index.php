<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
    
    <link rel="stylesheet" href="css/twentytwenty.css" type="text/css" media="screen">
</head>
<style>
        table {
      border-collapse: collapse;
      width: 100%;
        }
         tr,
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Главная</a></li>
            <?php 
                    if ($_COOKIE['user'] == ''):
                    ?>
                
                <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        Личный кабинет
                        
                        
                        <span class="caret"></span></a>
                        
                    <ul class="dropdown-menu">
                        <li><a href="register.php">Зарегистрироваться</a></li>
                        <li><a href="login.php">Войти</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
                <?php 
                    elseif($_COOKIE['password'] == 'adminWSR'): 
                    ?>
                 <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        Администратор
                        
                        
                        <span class="caret"></span></a>
                        
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">Панель администратора</a></li>
                        <li><a href="exit.php">Выйти</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
                    <?php else: ?> 
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                       <p>Здравствуйте, <?=$_COOKIE['user']?>!</p>
                        
                        
                        <span class="caret"></span></a>
                        
                    <ul class="dropdown-menu">
                        <li><a href="list.php">Мои заявки</a></li>
                        <li><a href="new.php">Новая заявка</a></li>
                        <li><a href="person.php">Личный аккаунт</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="exit.php">Выход</a></li>
                    </ul>
                        </li>
                            
                    <?php endif;?>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>
            Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому мы
            предлагаем тебе помочь своему городу!
        </p>
        <p>
            Увидел проблему? Дай нам знать о ней и мы ее решим!
        </p>
        <p>
            <a class="btn btn-success btn-lg" href="login.php" role="button">Сообщить о проблеме</a>
            <a class="btn btn-primary btn-lg" href="register.php" role="button">Присоедениться к проекту</a>
        </p>
    </div>
</div>

<div class="container">
    <h2>Последние решенные проблемы</h2>
    <br>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `nazvanie`, `opisanie`, `categoria`, `data` FROM `zayavka` where `status` = 'Решена' and `kod` = 34";
            if($result = mysqli_query($conn, $sql)){
                
                echo "<table>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<tr><p><h3>" . $row["nazvanie"] . "</h3></p></tr>";
                    echo "<tr><p>" . $row["opisanie"] . "</p></tr>";
                    echo "<tr><p>" . $row["categoria"] . "</p></tr>";
                    echo "<tr><small>" . $row["data"] . "</small></tr>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
      
      <div class="before-after">
          <img class = "before-after__item" src="images/problem1.jpeg" />
          <img class="before-after__item" src="images/decision1.jpeg" />
        </div>
    </div>
</div>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `nazvanie`, `opisanie`, `categoria`, `data` FROM `zayavka` where `status` = 'Решена' and `kod` = 35";
            if($result = mysqli_query($conn, $sql)){
                
                echo "<table>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<tr><p><h3>" . $row["nazvanie"] . "</h3></p></tr>";
                    echo "<tr><p>" . $row["opisanie"] . "</p></tr>";
                    echo "<tr><p>" . $row["categoria"] . "</p></tr>";
                    echo "<tr><small>" . $row["data"] . "</small></tr>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
                <div class="before-after">
          <img class = "before-after__item" src="images/problem3.jpeg" />
          <img class="before-after__item" src="images/decision3.jpeg" />
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `nazvanie`, `opisanie`, `categoria`, `data` FROM `zayavka` where `status` = 'Решена' and `kod` = 36";
            if($result = mysqli_query($conn, $sql)){
                
                echo "<table>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<tr><p><h3>" . $row["nazvanie"] . "</h3></p></tr>";
                    echo "<tr><p>" . $row["opisanie"] . "</p></tr>";
                    echo "<tr><p>" . $row["categoria"] . "</p></tr>";
                    echo "<tr><small>" . $row["data"] . "</small></tr>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
                <div class="before-after">
          <img class = "before-after__item" src="images/problem4.jpeg" />
          <img class="before-after__item" src="images/decision4.jpeg" />
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `nazvanie`, `opisanie`, `categoria`, `data` FROM `zayavka` where `status` = 'Решена' and `kod` = 37";
            if($result = mysqli_query($conn, $sql)){
                
                echo "<table>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<tr><p><h3>" . $row["nazvanie"] . "</h3></p></tr>";
                    echo "<tr><p>" . $row["opisanie"] . "</p></tr>";
                    echo "<tr><p>" . $row["categoria"] . "</p></tr>";
                    echo "<tr><small>" . $row["data"] . "</small></tr>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
                <div class="before-after">
          <img class = "before-after__item" src="images/problem5.jpeg" />
          <img class="before-after__item" src="images/decision5.jpeg" />
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-3">
            <div class="thumbnail">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registr");
            if (!$conn) {
                die("Ошибка: " . mysqli_connect_error());
            }
            $sql = "SELECT `nazvanie`, `opisanie`, `categoria`, `data` FROM `zayavka` where  `kod` = 38";
            if($result = mysqli_query($conn, $sql)){
                
                echo "<table>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<tr><p><h3>" . $row["nazvanie"] . "</h3></p></tr>";
                    echo "<tr><p>" . $row["opisanie"] . "</p></tr>";
                    echo "<tr><p>" . $row["categoria"] . "</p></tr>";
                    echo "<tr><small>" . $row["data"] . "</small></tr>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "Ошибка: " . mysqli_error($conn);
            }
            mysqli_close($conn);
           
            ?>
                <div class="before-after">
          <img class = "before-after__item" src="images/problem6.jpeg" />
          <img class="before-after__item" src="images/decision6.jpeg" />
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/jquery.event.move.js"></script>
  <script src="./js/jquery.twentytwenty.js"></script>
  <script>
    $(function () {
      $(".before-after").twentytwenty({
        move_slider_on_hover: true,
        no_overlay: true,
        // orientation: 'vertical',
        // before_label: 'Было',
        // after_label: 'Стало',
      });
    });
  </script>
</body>
</html>