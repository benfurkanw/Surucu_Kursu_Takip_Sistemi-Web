<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Formdan gelen sürücü adı ve soyadını al
$surucu_ad = $_POST['sürücüad'];
$surucu_soyad = $_POST['sürücüsoyad'];

// Veritabanında sürücüyü sil
$sql = "DELETE FROM surucukayit_tablosu WHERE Surucu_ad='$surucu_ad' AND Surucu_Soyad='$surucu_soyad'";
$result = $conn->query($sql);

if ($result === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "<script>alert('Sürücü Başarıyla Silindi');  window.location.href = '../home.php'; </script>";
    } else {
        echo "<script>alert('Sürücü Bulunamadı');  window.location.href = '../home.php'; </script>";
    }
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>

