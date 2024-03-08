<?php
session_start();

// Session'lardan değerleri al
$surucuAd = isset($_SESSION['surucuAd']) ? $_SESSION['surucuAd'] : '';
$surucuSoyad = isset($_SESSION['surucuSoyad']) ? $_SESSION['surucuSoyad'] : '';
$surucuNo = isset($_SESSION['surucuNo']) ? $_SESSION['surucuNo'] : '';
$odenen = isset($_SESSION['odenen']) ? $_SESSION['odenen'] : '';
$odemeKalan = isset($_SESSION['odemeKalan']) ? $_SESSION['odemeKalan'] : '';
$toplamOdeme = isset($_SESSION['toplamOdeme']) ? $_SESSION['toplamOdeme'] : 0;

// Veritabanı bağlantısını kurun (db_connection.php gibi bir dosyanın varlığını kontrol etmeyi unutmayın)
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen ödeme miktarını al
    $odenmisMiktar = isset($_POST['ödeme']) ? floatval($_POST['ödeme']) : 0;

    // Ödenen miktarı güncelle
    $yeniodenen = floatval($odenen) + $odenmisMiktar;
    $yenikalan = floatval($odemeKalan) - $odenmisMiktar;

    // Ödenen miktarın, kalan ödemeden büyük olup olmadığını kontrol et
    if ($odenmisMiktar > $odemeKalan) {
        echo "<script>alert('Hata: Girdiğiniz miktar, kalan ödemeden daha büyük. Lütfen geçerli bir miktar girin.'); window.location.href = '../home.php';</script>";
    } else {
        // Veritabanında güncelleme yap
        $sql = "UPDATE surucuOdemeleri SET Odenen = $yeniodenen, OdemeKalan = $yenikalan WHERE Surucu_No = $surucuNo";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Ödeme İşlemi Başarılı'); window.location.href = '../home.php';</script>";
            // Güncelleme başarılıysa, tekrar sorgula ve yeni bilgileri al
            $result = $conn->query("SELECT * FROM sürücüödemeleri WHERE Surucu_No = $surucuNo");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $odenen = $row['Odenen'];
                $odemeKalan = $row['OdemeKalan'];
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

