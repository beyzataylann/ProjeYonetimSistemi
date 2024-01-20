<?php
// update_task_status.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proje_kontrol_sistemi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanına bağlantı hatası: " . $conn->connect_error);
}

if (isset($_GET['gorev_id'])) {
    $gorev_id= $_GET['gorev_id'];

    // Assuming your tasks table has a column named 'status', update it to 'completed'
    $updateSql = "UPDATE gorev SET status = 'completed' WHERE task_id = $gorev_id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Görev tamamlandı.";
    } else {
        echo "Görev tamamlanamadı. Hata: " . $conn->error;
    }
}

$conn->close();
?>
