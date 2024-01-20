<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Silme Formu</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen proje ID'sini al
    $projeID = $_POST["proje_id"];

    // Veritabanı bağlantısı için bilgiler
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proje_kontrol_sistemi";

    // Veritabanına bağlan
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // Proje silmek için SQL sorgusu
    $sql = "DELETE FROM proje WHERE proje_id = $projeID";

    // Sorguyu çalıştır
    if ($conn->query($sql) === TRUE) {
        echo "Proje başarıyla silindi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
}
?>

<h2>Proje Silme Formu</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Proje ID'si: <input type="text" name="proje_id" required>
    <input type="submit" value="Proje Sil">
</form>

</body>
</html>
