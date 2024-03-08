<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

    $giderAd = $_POST['giderAd'];
    $giderMiktar = $_POST['giderMiktar'];
    $giderTarih = $_POST['giderTarih'];
    $giderAciklama = $_POST['giderAciklama'];

    // Veritabanına kayıt ekleme
    $sql = "INSERT INTO giderkayit_tablosu (Gider_Ad, Gider_Miktar, Gider_Aciklama, Gider_Tarih) VALUES ('$giderAd', '$giderMiktar', '$giderAciklama', '$giderTarih')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Gider başarıyla eklendi.'); window.location.href = '../home.php';</script>";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

// Veritabanı bağlantısını kapat
$conn->close();
?>
