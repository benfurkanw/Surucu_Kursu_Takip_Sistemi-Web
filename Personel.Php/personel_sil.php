<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Formdan gelen sürücü adı ve soyadını al
$personel_ad = $_POST['personelad'];
$personel_soyad = $_POST['personelsoyad'];

// Veritabanında sürücüyü sil
$sql = "DELETE FROM personelkayit_tablosu WHERE Personel_Ad='$personel_ad' AND Personel_Soyad='$personel_soyad'";
$result = $conn->query($sql);

if ($result === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "<script>alert('Personel Başarıyla Silindi');  window.location.href = '../home.php'; </script>";
    } else {
        echo "<script>alert('Sürücü Bulunamadı');  window.location.href = '../home.php'; </script>";
    }
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>