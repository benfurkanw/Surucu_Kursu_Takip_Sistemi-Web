<?php
// Veritabanı bağlantısı
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Formdan gelen verileri al
$tc = $_POST['tc'];
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$babaAdi = $_POST['babaAdi'];
$anneAdi = $_POST['anneAdi'];
$dogumYeri = $_POST['dogumYeri'];
$dogumTarihi = $_POST['dogumTarihi'];
$kanGrubu = $_POST['kanGrubu'];
$egitimDurumu = $_POST['egitimDurumu'];
$ceptel = $_POST['ceptel'];
$ehliyetsınıfı = $_POST['ehliyetsınıfı'];
$adres = $_POST['adres'];

// SQL sorgusunu oluştur
$sql = "INSERT INTO surucukayit_tablosu (Surucu_Tc, Surucu_ad, Surucu_Soyad, Surucu_BabaAdi, Surucu_AnneAdi, Surucu_DogumYeri, Surucu_DogumTarihi, Surucu_KanGrubu, Surucu_EgitimDurumu, Surucu_CepTel, Surucu_EhliyetSinifi, Surucu_Adres)
VALUES ('$tc', '$ad', '$soyad', '$babaAdi', '$anneAdi', '$dogumYeri', '$dogumTarihi', '$kanGrubu', '$egitimDurumu', '$ceptel', '$ehliyetsınıfı', '$adres')";

// Eklenen sürücü numarasını alın
$last_inserted_id = $conn->insert_id;

// Sorguyu çalıştır ve sonucu kontrol et
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Sürücü Kayıtı Başarılı'); window.location.href = '../home.php';</script>";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
