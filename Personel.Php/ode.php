<?php
session_start();

// Session'lardan değerleri al
$personelAd = isset($_SESSION['personelAd']) ? $_SESSION['personelAd'] : '';
$personelSoyad = isset($_SESSION['personelSoyad']) ? $_SESSION['personelSoyad'] : '';
$personelNo = isset($_SESSION['personelNo']) ? $_SESSION['personelNo'] : '';
$odenen2 = isset($_SESSION['odenen2']) ? $_SESSION['odenen2'] : '';
$odemeKalan2 = isset($_SESSION['odemeKalan2']) ? $_SESSION['odemeKalan2'] : '';
$toplamOdeme2 = isset($_SESSION['toplamOdeme2']) ? $_SESSION['toplamOdeme2'] : 0;

// Veritabanı bağlantısını kurun (db_connection.php gibi bir dosyanın varlığını kontrol etmeyi unutmayın)
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen ödeme miktarını al
    $odenmisMiktar = isset($_POST['ödeme']) ? floatval($_POST['ödeme']) : 0;

    // Ödenen miktarı güncelle
    $yeniodenen = floatval($odenen2) + $odenmisMiktar;
    $yenikalan = floatval($odemeKalan2) - $odenmisMiktar;

    // Ödenen miktarın, kalan ödemeden büyük olup olmadığını kontrol et
    if ($odenmisMiktar > $odemeKalan2) {
        echo "<script>alert('Hata: Girdiğiniz miktar, kalan ödemeden daha büyük. Lütfen geçerli bir miktar girin.'); window.location.href = '../home.php';</script>";
    } else {
        // Veritabanında güncelleme yap
        $sql = "UPDATE personelOdemeleri SET Odenen = $yeniodenen, OdemeKalan = $yenikalan WHERE Personel_No = $personelNo";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Ödeme İşlemi Başarılı'); window.location.href = '../home.php';</script>";
            // Güncelleme başarılıysa, tekrar sorgula ve yeni bilgileri al
            $result = $conn->query("SELECT * FROM sürücüödemeleri WHERE Surucu_No = $personelNo");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $odenen2 = $row['Odenen'];
                $odemeKalan2 = $row['OdemeKalan'];
            } else {
                echo "Hata: Veriler alınamadı.";
            }
        } else {
            echo "Hata: " . $conn->error;
        }
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>