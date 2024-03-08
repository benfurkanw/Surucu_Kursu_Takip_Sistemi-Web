<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Formdan gelen verileri al
$isim = $_POST['isim'];
$soyad = $_POST['soyad'];
$mail = $_POST['mail'];
$kullaniciAdi = $_POST['kullaniciAdi'];
$sifre = $_POST['sifre'];

// SQL sorgusu oluştur
$sql = "INSERT INTO kullanici_tablosu (isim, soyad, mail, kullanici_adi, sifre) VALUES ('$isim', '$soyad', '$mail', '$kullaniciAdi', '$sifre')";

// Sorguyu çalıştır ve sonucu kontrol et
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Kayıt işlemi Başarılı'); window.location.href = '../index.php';</script>";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>
