<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Veritabanı bağlantısı
    include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

    // Form verilerini alma
    $Personelad = $_POST['Personelad'];
    $Personelsoyad = $_POST['Personelsoyad'];
    $giristarih = $_POST['giristarih'];
    $gorev = $_POST['gorev'];
    $maas = $_POST['maas'];

    // SQL sorgusu
    $sql = "INSERT INTO personelkayit_tablosu (Personel_Ad, Personel_Soyad, Personel_Gtarihi, Personel_Gorevi, Personel_Maasi)
            VALUES ('$Personelad', '$Personelsoyad', '$giristarih', '$gorev', '$maas')";

    // Sorgu çalıştırma
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Personel Kayıtı Başarılı'); window.location.href = '../home.php';</script>";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapatma
    $conn->close();
}
?>
