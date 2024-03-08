<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Formdan gelen verileri al
$girisKullaniciAdi = $_POST['girisKullaniciAdi'];
$girisSifre = $_POST['girisSifre'];

// Kullanıcıyı kontrol et
$sql = "SELECT * FROM kullanici_tablosu WHERE kullanici_adi = '$girisKullaniciAdi' AND sifre = '$girisSifre'";
$result = $conn->query($sql);

// Kullanıcı bulundu mu kontrol et
if ($result->num_rows > 0) {
    // Kullanıcı doğruysa, oturumu başlat
    session_start();
    
    // Kullanıcının adını oturuma kaydet
    $kullanici = $result->fetch_assoc();
    $_SESSION['isim'] = $kullanici['isim'];

    // Ana sayfaya yönlendir
    header("Location: ../home.php");
    exit();
} else {
    // Kullanıcı bulunamazsa, hata mesajı göster
    echo "Kullanıcı adı veya şifre yanlış.";
}

// Bağlantıyı kapat
$conn->close();
?>