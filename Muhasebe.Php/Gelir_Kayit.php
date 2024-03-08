<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

    $gelirAd = $_POST['gelirAd'];
    $gelirMiktar = $_POST['gelirMiktar'];
    $gelirTarih = $_POST['gelirTarih'];
    $gelirAciklama = $_POST['gelirAciklama'];

    // Veritabanına kayıt ekleme
    $sql = "INSERT INTO gelirkayit_tablosu (Gelir_Ad, Gelir_Miktar, Gelir_Aciklama, Gelir_Tarih) VALUES ('$gelirAd', '$gelirMiktar', '$gelirAciklama', '$gelirTarih')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Gelir başarıyla eklendi.'); window.location.href = '../home.php';</script>";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

// Veritabanı bağlantısını kapat
$conn->close();
?>
