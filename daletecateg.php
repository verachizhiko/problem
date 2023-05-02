<?php
if(isset($_POST["kod"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=registr", "root", "");
        $sql = "DELETE FROM kategor WHERE kod = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":userid", $_POST["kod"]);
        $stmt->execute();
        header("Location: deletecat.php");
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>