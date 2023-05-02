
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
    </div>
</nav>
<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <h1>Панель управления</h1>
        <h2>Удаление категории</h2>
            
            <?php
        try {
            $conn = new PDO("mysql:host=localhost;dbname=registr", "root", "");
            $sql = "SELECT * FROM kategor";
            $result = $conn->query($sql);
            echo "<table><tr><th>ID</th><th>Название</th><th></th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row["kod"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td><form action='daletecateg.php' method='post'>
                <input type='hidden' name='kod' value='" . $row["kod"] . "' />
                <input type='submit' value='Удалить'>
                </form></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
        ?>  
    </div>
</main>
</body>
</html>